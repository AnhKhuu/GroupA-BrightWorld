@extends('admin.dashboard')
@section('title')
Feedback Management
@endsection
@section('content')
<div>
<br>
    <!-- <h2>Feedback Reply</h2> -->
    <form method="post" action="{{ url("admin/feedback/updateProcess/{$rs -> id}") }}" >
        @csrf
        Id: <input name="txtId" value="{{$rs -> id}}" readonly/><br>
        Rating: <input name="txtRating" value="{{$rs -> rating}}"/><br>
        Content: <input name="txtContent" value="{{$rs -> content}}"/><br>
        Product Id: <input name="txtProductId" value="{{$rs -> product_id}}" readonly/><br>
        Customer Id: <input name="txtCustomerId" value="{{$rs -> customer_id}}" readonly/><br>
        Reply: <input name="txtReply" value="{{$rs -> reply}}"/><br>
        <input type="submit" value="Reply"/><br>
    </form>
</div>
@endsection