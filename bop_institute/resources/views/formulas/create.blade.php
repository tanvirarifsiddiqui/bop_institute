<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add a Formla</h1>
    <form method="POST" action="{{route('formulas.store')}}">
    @csrf
    @method('post')

    <div>
        <label for="">Formula Name</label>
        <input type="text" name = "title", placeholder="name"/>
    </div>
    <div>
        <label for="">Category ID</label>
        <input type="text" name = "category_id", placeholder="Category"/>
    </div>
    <div>
        <label for="">Price</label>
        <input type="text" name = "price", placeholder="price"/>
    </div>
    <div>
        <label for="">Description</label>
        <input type="text" name = "description", placeholder="description"/>
    </div>
    <div>
        <label for="">Discount</label>
        <input type="text" name = "discount", placeholder="doscount"/>
    </div>
    <div>
        <input type="submit" value="save formula"/>
    </div>
</form>
</body>
</html>