@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card text-center">
    <div class="card-body">
      <h1 class="card-title">
        {{$program->title}}
      </h1>
    </div>
  </div>
</div>
<br>

<div class="container">
  <div class="card mb-2">
    <div class="card-header">
      経過時間
    </div>
    <div class="card-body">

      <div id="clock" class="text-center">00:00:00
      </div>
      <input type="hidden" name="program_id" id="program_id" value="{{ $program->id }}">
      <button class="btn btn-primary" id="update" type="button">ツイート取得</button>
    </div>
  </div>
</div>
<div class="container">
  <div class="d-grid gap-2">

  </div>
</div>
<div class="container">
  <div id="tweet">
  </div>
</div>

<button type="button" onclick="historu.back()">戻る</button>

@endsection