@extends('admin.dashboard')
@section('title')
Feedback Management
@endsection
@section('content')
<div class="d-flex justify-content-end m-2 p-2">
    <a href="{{url('feedback/create')}}">
        <button type="button" class="btn btn-block btn-outline-primary">New Feedback</button>
    </a>
</div>
<div>
    
        <table class="table table-hove table-bordered">
            <tr>
                <th>id</th>
                <th>rating</th>
                <th>content</th>
                <th>product_id</th>
                <th>customer_id</th>
                <th>Funtion</th>
            </tr>
            <tbody>
            @foreach($feedbacks as $item)
                <tr>
                    <td>{{$item -> id }}</td>
                    <td>{{$item -> rating }}</td>
                    <td>{{$item -> content }}</td>
                    <td>{{$item -> product_id }}</td>
                    <td>{{$item -> customer_id }}</td>
                    <td>
                        <a href="{{url("../../admin/feedback/update/{$item -> id}") }}">Reply</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    
</div>
@endsection