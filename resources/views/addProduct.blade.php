<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="p-5 d-flex flex-column">
    <h1 class="mb-5 text-center">Add product</h1>
    
    <form action="/add-product" method="post" enctype="multipart/form-data">
        @csrf
        <input class="mb-2 form-control" type="text" name="name" id="" placeholder="Product name">
        <select class="mb-2 form-select" name="category_id" id="category_id">
            <option value="">-- Select Category</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <input class="mb-2 form-control" type="number" name="price" id="price" placeholder="Price">
        <input class="mb-2 form-control" type="number" name="stock" id="stock" placeholder="Stock">
        <input class="mb-5 form-control" type="file" name="image" id="image">
        <button class="btn btn-dark" type="submit">Add product</button>
    </form>
</body>
</html>