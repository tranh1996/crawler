@extends('layouts.app')
@section('content')
<div class="container">
<h2> Create Items </h2>
<hr>
 @include('flash::message')
  <form method="POST" action="{{ route('item.store') }}">
    @include('Items.partials.form' ) 
  </form>
</div>
@endsection