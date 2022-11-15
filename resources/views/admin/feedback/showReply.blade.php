@extends('admin.dashboard')
@section('title')
Feedback Management
@endsection
@section('content')

<div>
<br>
<form>
    <div class="container">
    <div>Feedback Show Answered.    
        <span>
            <a href="{{url("admin/feedback/show")}}"> Show Reply not yes</a> | 
            <a href="{{url("admin/feedback/showAll")}}"> Show All</a>
        </span>
    </div>
        <table class="table table-hove table-bordered">
            <tr>
                <th>id</th>
                <th>rating</th>
                <th>content</th>
                <th>product_id</th>
                <th>customer_id</th>
                <th>reply</th>
                <th>Funtion</th>
            </tr>
            @foreach($itemss as $item)
            <tr>
                <td>{{$item -> id}}</td>
                <td>{{$item -> rating }}</td>
                <td>{{$item -> content }}</td>
                <td>{{$item -> product_id }}</td>
                <td>{{$item -> customer_id }}</td>
                <td>{{$item -> reply }}</td>
                <td>
                    <a href="{{url("admin/feedback/update/{$item ->id}")}}">Reply</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</form>
@endsection