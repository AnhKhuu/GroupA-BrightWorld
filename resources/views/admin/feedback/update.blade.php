@extends('admin.dashboard')
@section('title')
Feedback 
@endsection
@section('content')
<body>
<h1>Reply</h1>
    <form action="{{ url('admin/feedback/update/{$feedbacks -> id}') }}" method = "post">
        @csrf
        Id: <input name="txtId" value="{{$feedbacks -> id}}" readonly/><br>
        Rating: <input name="txtRating" value="{{$feedbacks -> rating}}"/><br>
        Content: <input name="txtContent" value="{{$feedbacks -> content}}"/><br>
        Product Id: <input name="txtProductId" value="{{$feedbacks -> product_id}}" readonly/><br>
        Customer Id: <input name="txtCustomerId" value="{{$feedbacks -> customer_id}}" readonly/><br>
        <input type="submit" value="updateProcess"/><br>
    </form>
</body>
@endsection