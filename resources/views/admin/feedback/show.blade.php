@extends('admin.dashboard')
@section('title')
Feedback Management
@endsection
@section('content')

<div>
<br>
    <div>Feedback Show Reply not yes
    <form>
    <div class="container">
        <!-- <span> -->
            <a href="{{url("admin/feedback/showAll")}}">Show All</a>
        <!-- </span> -->
        <!-- ///href="{{url("admin/feedback/show")}}" -->
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
            @foreach($items as $item)
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
</div>
@endsection