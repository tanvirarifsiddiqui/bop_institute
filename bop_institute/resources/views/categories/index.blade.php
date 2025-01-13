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
        Categories
    </h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('categories.edit',  ['category'=>$category])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>