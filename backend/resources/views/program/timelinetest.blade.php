@extends('layouts.app')

@section('content')
<div class="container">
  
  @foreach ($result->statusces as $tweet)
  <div class="card mb-2">
    <div class="card-body">
      <div class="media">
        <img src="https://placehold.jp/70x70.png" class="rounded-circle mr-4">
        <div class="media-body">

          <p class="mt-3 mb-0">{{ $tweet->text }}</p>
          <p class="mt-3 mb-0">{{ $tweet->created_at }}</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection