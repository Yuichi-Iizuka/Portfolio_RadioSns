@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card info-color white-text text-center py-4">
    <div class="card-body">
      <div class="card-title">
        <p class="h1">番組一覧</p>
      </div>
    </div>
  </div>
</div>
</div>

@foreach($item as $item)
<div class="container">
  <div class="row">
    <div class="col-md mb-4">
      <div class="card">
        <div class="card-body text-center">
          <h4 class="card-title">{{$item->title}}</h4>
          <hr>
          <p class="card-text">{{$item->body}}</p>
          <a href="{{ route('program.show',$item->id)}}" class="orange-text d-flex flex-row-reverse p-2"><h5>詳細を見る<i class="fas fa-angle-double-right ml-2"></i></h5></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection