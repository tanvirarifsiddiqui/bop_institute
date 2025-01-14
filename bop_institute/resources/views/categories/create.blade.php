<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add a Category</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->any as $error)
              <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{route('admin.categories.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="">Category Name</label>
            <input type="text" name = "name", placeholder="name"/>
        </div>
        <div>
            <input type="submit" value="Save Category"/>
        </div>
    </form>
</body>
</html>
