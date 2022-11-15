@extends('user.layout')
@section('title')
    Success
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/homepage.css') }}" />
@endsection
@section('content')

<div class="card-1 mt-5 mb-5">
    <div class="card-1-1">
      <i class="checkmark">✓</i>
    </div>
      <h1>Success</h1> 
      <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
    </div>
@endsection
