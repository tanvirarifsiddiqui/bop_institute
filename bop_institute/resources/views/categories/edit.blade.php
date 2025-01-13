<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Category</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>  
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{route('categories.update', ['category'=>$category])}}">
        @csrf
        @method('put')
        <div>
            <label for="">Category Name</label>
            <input type="text" name = "name", placeholder="name" value="{{$category->name}}"/>
        </div>
        <div>
            <input type="submit" value="Update"/>
        </div>
    </form>
</body>
</html>