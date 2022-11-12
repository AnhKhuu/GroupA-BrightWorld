@extends('admin.dashboard')
@section('title')
Feedback 
@endsection
@section('content')

<div>
    <h1>Create new Comment</h1>
    <form >
        @csrf 
        Id: <input name="txtId"/><br>
        Rating: <input name="txtRating"/><br>
        Content: <input name="txtContent"/><br>
        Product Id: <input name="txtProductId"/><br>
        Customer Id: <input name="txtCustomerId"/><br>
        <input type="submit" value="create"/><br>
    </form>
</div>
@endsection