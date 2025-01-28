<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Karim007\LaravelBkashTokenize\Facade\BkashPaymentTokenize;
use Karim007\LaravelBkashTokenize\Facade\BkashRefundTokenize;

class BkashTokenizePaymentController extends Controller
{
    public function index()
    {
        return view('bkashT::bkash-payment');
    }
    public function createPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01', // Ensure the amount is valid
        ]);

        $inv = uniqid();
        $request['intent'] = 'sale';
        $request['mode'] = '0011'; //0011 for checkout
        $request['payerReference'] = $inv;
        $request['currency'] = 'BDT';
        $request['amount'] = $request->input('amount');
        $request['merchantInvoiceNumber'] = $inv;
        $request['callbackURL'] = config("bkash.callbackURL");

        $request_data_json = json_encode($request->all());

        $response =  BkashPaymentTokenize::cPayment($request_data_json);
        Log::info('Create Payment Response:',['response'=>$response]);

        //$response =  BkashPaymentTokenize::cPayment($request_data_json,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..

        //store paymentID and your account number for matching in callback request
        // dd($response) //if you are using sandbox and not submit info to bkash use it for 1 response

        if (isset($response['bkashURL'])) return redirect()->away($response['bkashURL']);
        else return redirect()->back()->with('error-alert2', $response['statusMessage']);
    }

//    public function callBack(Request $request)
//    {
//        //callback request params
//        // paymentID=your_payment_id&status=success&apiVersion=1.2.0-beta
//        //using paymentID find the account number for sending params
//
//        if ($request->status == 'success'){
//            $response = BkashPaymentTokenize::executePayment($request->paymentID);
//            Log::info('Execute Payment Response:', ['response'=>$response]);
//
//
//            if (!$response){ //if executePayment payment not found call queryPayment
//                $response = BkashPaymentTokenize::queryPayment($request->paymentID);
//                //$response = BkashPaymentTokenize::queryPayment($request->paymentID,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
//            }
//
//            if (isset($response['statusCode']) && $response['statusCode'] == "0000" && $response['transactionStatus'] == "Completed") {
//
//                // Save payment details in the database
//                $payment = \App\Models\Payment::create([
//                    'user_id' => auth()->id(),
//                    'formula_id' => $request->input('formula_id'), // Pass formula_id from the frontend
//                    'payment_id' => $response['paymentID'],
//                    'trx_id' => $response['trxID'],
//                    'transaction_status' => $response['transactionStatus'],
//                    'amount' => $response['amount'],
//                    'currency' => $response['currency'],
//                    'payment_execute_time' => $response['paymentExecuteTime'],
//                    'payer_reference' => $response['payerReference'],
//                ]);
//
//                // Optionally: Update formula purchase count
//                $formula = \App\Models\Formula::find($request->input('formula_id'));
//                if ($formula) {
//                    $formula->increment('purchase');
//                }
//
//                //todo: Send PDF via email or any further actions here.
//
//                /*
//                 * for refund need to store
//                 * paymentID and trxID
//                 * */
//                // Generate a temporary link for the PDF download
//
//                $pdfLink = route('formula.download', ['paymentId' => $payment->id]);
//
////                return BkashPaymentTokenize::success('Thank you for your payment', $response['trxID']);
//                return redirect($pdfLink)->with('success', 'Thank you for your payment!');
//            }
//            return BkashPaymentTokenize::failure($response['statusMessage']);
//        }else if ($request->status == 'cancel'){
//            return BkashPaymentTokenize::cancel('Your payment is canceled');
//        }else{
//            return BkashPaymentTokenize::failure('Your transaction is failed');
//        }
//    }

    public function callBack(Request $request)
    {
        // Simulate a successful transaction response
        $response = [
            'paymentID' => $request->paymentID,
            'trxID' => $request->trxID,
            'transactionStatus' => $request->transactionStatus,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'paymentExecuteTime' => $request->paymentExecuteTime,
            'payerReference' => 'TEST12345',
        ];

        // Extract and format the paymentExecuteTime
        $rawPaymentTime = $response['paymentExecuteTime'];
        $formattedPaymentTime = null;

        try {
            // Convert raw time into MySQL-compatible DATETIME format
            $formattedPaymentTime = \Carbon\Carbon::parse($rawPaymentTime)->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            Log::error('Error parsing paymentExecuteTime:', ['error' => $e->getMessage()]);
        }

        if ($response['transactionStatus'] === 'Completed') {
            // Save payment details in the database
            \App\Models\Payment::create([
                'user_id' => auth()->id(),
                'formula_id' => $request->input('formula_id'),
                'payment_id' => $response['paymentID'],
                'trx_id' => $response['trxID'],
                'transaction_status' => $response['transactionStatus'],
                'amount' => $response['amount'],
                'currency' => $response['currency'],
                'payment_execute_time' => $formattedPaymentTime,
                'payer_reference' => $response['payerReference'],
            ]);

            // Update the purchase count for the formula
            $formula = \App\Models\Formula::find($request->input('formula_id'));
            if ($formula) {
                $formula->increment('purchase');
            }

            // Redirect to the download route
            return redirect()->route('formula.download', ['paymentId' => $response['paymentID']])
                ->with('success', 'Test transaction completed successfully!');
        }

        // Handle other transaction statuses
        return redirect()->back()->with('error', 'Transaction failed or was canceled.');
    }




    public function searchTnx($trxID)
    {
        //response
        return BkashPaymentTokenize::searchTransaction($trxID);
        //return BkashPaymentTokenize::searchTransaction($trxID,1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }

    public function refund(Request $request)
    {
        $paymentID='Your payment id';
        $trxID='your transaction no';
        $amount=5;
        $reason='this is test reason';
        $sku='abc';
        //response
        return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku);
        //return BkashRefundTokenize::refund($paymentID,$trxID,$amount,$reason,$sku, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
    public function refundStatus(Request $request)
    {
        $paymentID='Your payment id';
        $trxID='your transaction no';
        return BkashRefundTokenize::refundStatus($paymentID,$trxID);

        //return BkashRefundTokenize::refundStatus($paymentID,$trxID, 1); //last parameter is your account number for multi account its like, 1,2,3,4,cont..
    }
}
