@extends('admin.dashboard')
@section('title')
Feedback Management
@endsection
@section('content')

<div>
<br>
<form>
    <div class="container">
    <div>Feedback Show All.
        <span>
            <a href="{{url("admin/feedback/show")}}"> Show Reply not yes</a> | 
            <a href="{{url("admin/feedback/showReply")}}"> Show Answered</a>
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
            @foreach($itemss as $ite)
            <tr>
                <td>{{$ite -> id}}</td>
                <td>{{$ite -> rating }}</td>
                <td>{{$ite -> content }}</td>
                <td>{{$ite -> product_id }}</td>
                <td>{{$ite -> customer_id }}</td>
                <td>{{$ite -> reply }}</td>
                <td>
                    <a href="{{url("admin/feedback/update/{$ite ->id}")}}"> Reply</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</form>
</div>
@endsection