<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Formla</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>  
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{route('formulas.update', ['formula' => $formula])}}">
    @csrf
    @method('put')

    <div>
        <label for="">Formula Name</label>
        <input type="text" name = "title", placeholder="name" value="{{$formula->title}}"/>
    </div>
    <div>
        <label for="">Category ID</label>
        <input type="text" name = "category_id", placeholder="Category" value="{{$formula->category_id}}"/>
    </div>
    <div>
        <label for="">Price</label>
        <input type="text" name = "price", placeholder="price" value="{{$formula->price}}"/>
    </div>
    <div>
        <label for="">Description</label>
        <input type="text" name = "description", placeholder="description" value="{{$formula->description}}"/>
    </div>
    <div>
        <label for="">Discount</label>
        <input type="text" name = "discount", placeholder="doscount" value="{{$formula->discount}}"/>
    </div>
    <div>
        <input type="submit" value="Update"/>
    </div>
</form>
</body>
</html>