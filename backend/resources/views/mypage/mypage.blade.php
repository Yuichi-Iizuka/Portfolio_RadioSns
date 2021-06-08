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
      <a class="nav-link text-muted active">
        投稿した番組</a>
    </li>
    <li class="nav-item">
      <a href="{{ route('mypage.like',$user->id) }}" class="nav-link text-muted">いいねした番組</a>
    </li>
  </ul>
</div>
@endsection