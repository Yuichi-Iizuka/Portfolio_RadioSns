@extends('layouts.app')

@section('title','マイページ')

@section('content')

<div class="container">
  @include('mypage.user')
  @include('mypage.tab',['hasProgram' => false,'hasLike'=> true])
  @include('program.list')
</div>
@endsection