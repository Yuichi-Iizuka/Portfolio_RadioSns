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
      <form>
        <div id="clock" class="display-4 text-center">00:00:00
        </div>
        <input type="hidden" name="program_id" id="program_id" value="{{ $program->id }}">
        <div class="row">
          <div class="col text-center">
            <button class="btn btn-outline-info waves-effect" id="update" type="button"><i class="fab fa-twitter"></i>ツイート取得</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="tweet">
  <div id="tweetlist" style="display: none;">
    <div class="container">
      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <div class="card-body">
              <p id="name" class="h4"></p>
              <hr>
              <!-- <div class="media">
            <img src="https://placehold.jp/70x70.png" class="rounded-circle mr-4"> -->
              <p id="text" class="h5"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection