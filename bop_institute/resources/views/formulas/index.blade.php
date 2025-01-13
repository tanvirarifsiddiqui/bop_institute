<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Formulas
    </h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th> 
                <th>Name</th> 
                <th>Description</th> 
                <th>Image</th> 
                <th>Price</th> 
                <th>Discount</th> 
                <th>pdf</th> 
                <th>purchasae</th> 
                <th>category_id</th> 
                <th>Edit</th> 
            </tr>
            @foreach ($formulas as $formula)
                <tr>
                    <td>{{$formula->id}}</td>
                    <td>{{$formula->title}}</td>
                    <td>{{$formula->description}}</td>
                    <td>{{$formula->Image}}</td>
                    <td>{{$formula->price}}</td>
                    <td>{{$formula->discount}}</td>
                    <td>{{$formula->pdf}}</td>
                    <td>{{$formula->purchase}}</td>
                    <td>{{$formula->category_id}}</td>
                    <td>
                        <a href="{{route('formulas.edit', ['formula'=>$formula])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>