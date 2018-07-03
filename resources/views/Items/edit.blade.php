@extends('layouts.app')
@section('content')
<div class="container">
<h2> Update Items </h2>
<hr>
 @include('flash::message')
 <form method="POST" action="{{ route('item.update', $item->id) }}">
   @include('items.partials.form')
  </form>
</div>
@endsection