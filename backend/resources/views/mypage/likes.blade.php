@extends('layouts.app')

@section('title','マイページ')

@section('content')

<div class="container">
  <div class="card">
    <div class="avatar mx-auto white">
      <i><i class="fas fa-user-circle fa-3x"></i>
        <div class="card-body text-center">
          <h4 class="card-title">{{ $user->name }}</h4>
        </div>
    </div>
  </div>

  <ul class="nav nav-tabs nav-justified mt-3">
    <li class="nav-item">
      <a href="{{ route('mypage.user') }}" class="nav-link text-muted">
        投稿した番組</a>
    </li>
    <li class="nav-item">
      <a href="{{ route('mypage.like') }}" class="nav-link text-muted active">いいねした番組</a>
    </li>
  </ul>
  @forelse($program as $program)
    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <div class="card-body text-center">
            <h4 class="card-title">{{$program->title}}</h4>
            <hr>
            <p class="card-text">{{$program->body}}</p>
            <a href="{{ route('program.show',$program->id)}}" class="orange-text d-flex flex-row-reverse p-2">
              <h5>詳細を見る<i class="fas fa-angle-double-right ml-2"></i></h5>
            </a>
          </div>
        </div>
      </div>
    </div>
  @empty
    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <div class="card-body text-center">
            <p class="card-text">いいねした番組はありません</p>
          </div>
        </div>
      </div>
    </div>
  @endforelse
</div>
@endsection