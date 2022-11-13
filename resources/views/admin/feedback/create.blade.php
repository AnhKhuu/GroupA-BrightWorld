@extends('admin.dashboard')
@section('title')
Feedback Management
@endsection
@section('content')
<div>
<br>
    <!-- <h1>Feedback Create</h1>  -->
    <form action="{{ url("admin/feedback/createProcess")}}" method="post">
        @csrf
        <!-- Id: <input name="txtId"/><br> -->
        Rating: <input name="txtRating"/><br>
        Content: <input name="txtContent"/><br>
        Product Id: <input name="txtProductId"/><br>
        Customer Id: <input name="txtCustomerId"/><br>
        Reply: <input name="txtReply"/><br>
        <input type="submit" value="create"/><br>
    </form>
</div>
@endsection