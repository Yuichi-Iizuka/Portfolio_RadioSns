@extends('layouts.app')

@section('content')

@foreach($item as $item)
<div class="container">
  <div class="row">
    <div class="col-lg-4">
      <div class="card">
        <img class="card-img-top" src="images/notepc-wp.jpeg" alt="ライトコースのイメージ画像">
        <div class="card-body">
          <h4 class="card-title">{{$item->title}}</h4>
          <p class="card-text">{{$item->body}}</p>
          <a href="{{ route('program.show',$item->id)}}" class="btn btn-primary">詳細を見る</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection