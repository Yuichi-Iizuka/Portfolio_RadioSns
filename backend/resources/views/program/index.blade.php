@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md mb-4">
      <div class="card info-color white-text text-center py-4">
        <div class="card-body">
          <div class="card-title">
            <p class="h1">番組一覧</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@foreach($program as $program)
@include('program.card')
@endforeach

@endsection