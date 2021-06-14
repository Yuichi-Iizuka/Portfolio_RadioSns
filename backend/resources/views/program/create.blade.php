@extends('layouts.app')

@section('content')
@guest
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <p class="h4 text-center py-4">番組作成</p>
          <p class="mb-0 text-center">
            <a href="{{ route('login') }}">ログイン</a>
            <span class="text-muted">すると作成できるようになります。</span>
          </p>
          </li>
        </div>
      </div>
    </div>
  </div>
</div>
@endguest

@auth
@include('program.store')
@endauth

@endsection