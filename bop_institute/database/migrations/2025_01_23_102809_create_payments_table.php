<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key for users
            $table->unsignedBigInteger('formula_id'); // Foreign key for formulas
            $table->string('payment_id')->unique(); // bKash payment ID
            $table->string('trx_id')->unique(); // bKash transaction ID
            $table->string('transaction_status'); // Transaction status
            $table->decimal('amount', 8, 2); // Payment amount
            $table->string('currency')->default('BDT'); // Currency type
            $table->timestamp('payment_execute_time'); // Payment execution time
            $table->string('payer_reference')->nullable(); // Payer reference
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('formula_id')->references('id')->on('formulas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
