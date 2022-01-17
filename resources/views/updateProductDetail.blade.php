<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="p-5 d-flex flex-column">
    <h1 class="mb-5 text-center">Update product</h1>
    <input class="mb-2 " type="text" name="name" id="" placeholder="Product name">
    <input class="mb-2 " type="number" name="price" id="" placeholder="Price">
    <input class="mb-2 " type="number" name="Stock" id="" placeholder="Stock">
    <input class="mb-5 " type="file" name="image" id="">
    <button class="btn btn-dark">Update product</button>
</body>
</html>