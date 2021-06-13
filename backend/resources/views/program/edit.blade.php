@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <form method="post" action="{{ route('program.update',$program->id) }}">
            @method('patch')
            @csrf
            <p class="h4 text-center py-4">番組編集</p>
            @include('program.form')
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">編集する</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection