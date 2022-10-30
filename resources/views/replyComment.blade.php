<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply</title>
</head>
<body>
<h1>Reply</h1>
    <form action="{{ url("replyProcess/{$rs -> id}") }}" method="post">
        @csrf
        <!-- Id: <input name="txtId" value="{{$rs -> id}}" readonly/><br> -->
        Rating: <input name="txtRating" value="{{$rs -> rating}}"/><br>
        Content: <input name="txtContent" value="{{$rs -> content}}"/><br>
        Product Id: <input name="txtProductId" value="{{$rs -> product_id}}" readonly/><br>
        Customer Id: <input name="txtCustomerId" value="{{$rs -> customer_id}}" readonly/><br>
        <input type="submit" value="commentProcess"/><br>
    </form>
</body>
</html>