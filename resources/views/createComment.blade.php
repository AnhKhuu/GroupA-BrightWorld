<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Comment</title>
</head>
<body>
    <h1>Create new Comment</h1>
    <form action="{{ url("/commentProcess") }}" method="post">
        @csrf
        <!-- Id: <input name="txtId"/><br> -->
        Rating: <input name="txtRating"/><br>
        Content: <input name="txtContent"/><br>
        Product Id: <input name="txtProductId"/><br>
        Customer Id: <input name="txtCustomerId"/><br>
        <input type="submit" value="createComment"/><br>
    </form>
</body>
</html>

