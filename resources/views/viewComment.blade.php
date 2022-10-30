<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <title>View Comments</title>
    

    </head>
    <body>
        <div class="container">
            <h2>List Of Comments</h2>
            <span><a href="{{url("/Comment")}}">Create New Comment</a></span>
            <table class="table table-hove table-bordered">
                <tr>
                    <th>id</th>
                    <th>rating</th>
                    <th>content</th>
                    <th>product_id</th>
                    <th>customer_id</th>
                    <th>Funtion</th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item -> id }}</td>
                        <td>{{$item -> rating }}</td>
                        <td>{{$item -> content }}</td>
                        <td>{{$item -> product_id }}</td>
                        <td>{{$item -> customer_id }}</td>
                        <td>
                            <a href="{{url("reply/{$item -> id}") }}">Reply</a> | 
                            <a href="{{url("delete/{$item -> id}") }}"
                               onclick="return confirm('Are you sure to delete {{$item -> content }} ?')" > Delete</a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </body>
</html>