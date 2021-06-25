@extends('layouts.app')

@section('title','マイページ')

@section('content')

<div class="container">
@include('mypage.user')
@include('mypage.tab',['hasProgram' => true,'hasLike'=> false])
@include('program.list')
</div>
@endsection