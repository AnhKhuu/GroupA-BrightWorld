@extends('admin.dashboard')
@section('title')
Feedback Management
@endsection
@section('content')
<div>
<br>
<form method="post" action="{{ url("admin/feedback/updateProcess/{$rs->id}")}}">
    <div class="container">
    <div>Feedback Reply</div>
        @csrf
        <table class="table table-hove table-bordered">
            <!-- <tr>
                <th></th>
                <th></th>
            </tr> -->
            <!-- <tr> -->
                <!-- <td>Id:</td> -->
                <td><input type="hidden" name="txtId" value="{{$rs -> id}}" readonly/></td>
            <!-- </tr> -->
            <tr>
                <td>Rating:</td>
                <td><input name="txtRating" value="{{$rs -> rating}}" readonly/></td>
            </tr>
            <tr>
                <td>Content:</td>
                <td><input name="txtContent" value="{{$rs -> content}}" readonly/></td>
            </tr>
            <tr>
                <td>Product Id:</td>
                <td><input name="txtCustomerId" value="{{$rs -> customer_id}}" readonly/></td>
            </tr>
            <tr>
                <td>Customer Id:</td>
                <td><input required name="txtProductId" value="{{$rs -> product_id}}" readonly/></td>
            </tr>
            <tr>
                <td>Reply:</td>
                <td><textarea type="Text" name="txtReply" value="{{$rs -> reply}}" required 
                pattern="[A-Za-z0-9]{3,1000}" title="Three letter reply" autofocus></textarea></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Reply"/><br>
    </div>
</form>
</div>

@endsection
        <!-- Id: <input name="txtId" value="{{$rs -> id}}" readonly/><br>
        Rating: <input name="txtRating" value="{{$rs -> rating}}"/><br>
        Content: <input name="txtContent" value="{{$rs -> content}}"/><br>
        Product Id: <input name="txtProductId" value="{{$rs -> product_id}}" readonly/><br>
        Customer Id: <input name="txtCustomerId" value="{{$rs -> customer_id}}" readonly/><br>
        Reply: <textarea>  type="Text" name="txtReply" value="{{$rs -> reply}}" </textarea><br> -->
        <!-- placeholder="In put reply here"  -->