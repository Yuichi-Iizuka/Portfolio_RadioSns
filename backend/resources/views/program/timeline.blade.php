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

<<<<<<< Updated upstream
      <div id="clock" class="text-center" value="clock">00:00:00
      </div>
      
      <input type="hidden" name="program_id" id="program_id" value="{{ $program->id }}">
      <button class="btn btn-primary" id="update" type="button">ツイート取得</button>
=======
      <form>
        <div id="clock" class="text-center">00:00:00
        </div>

        <input type="hidden" name="program_id" id="program_id" value="{{ $program->id }}">
        <button class="btn btn-primary" id="update" type="button">ツイート取得</button>
      </form>
>>>>>>> Stashed changes
    </div>
  </div>
</div>
<div class="container">
  <div class="d-grid gap-2">

  </div>
</div>
<div class="container">
  <div id="tweet">
    <div id="tweetlist" style="display: none;">
      <div class="card mb-2">
        <div class="card body">
          <div class="media">
            <img src="https://placehold.jp/70x70.png" class="rounded-circle mr-4">
            <div class="media-body">

              <p id="text" class="mt-3 mb-0"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <button type="button" onclick="historu.back()">戻る</button>

  @endsection