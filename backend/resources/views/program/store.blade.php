@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <h5 class="card-header info-color white-text text-center py-4">
      <strong>番組投稿</strong>
    </h5>
    <div class="card-body px-lg-5 pt-0">
      <form method="post" action="{{ route('program.store') }}">
        @csrf
        <div class="md-form">
          <input type="text" id="title" name="title" class="form-control" placeholder="サンプルのオールナイトニッポン">
          </input>
          <label class="form-label" for="title">
            タイトル
          </label>
        </div>
        <div class="md-form">
          <input type="text" id="body" name="body" class="form-control" rows="4" placeholder="ABCDEFG">
          <label class="form-label" for="body">
            内容
          </label>
        </div>
        <div class="md-form">
          <input type="text" id="tag" name="tag" class="form-control" placeholder="sampleANN">
          <label class="form-label" for="tag">
            タグ
          </label>
        </div>
        <div class="md-form md-outline">
          <input placeholder="Select date" type="date" id="start_date" name="start_date"class="form-control">
          <label for="start_date">日付け</label>
        </div>
        <div class="md-form md-outline">
          <input type="time" id="start_time" class="form-control" name="start_time"placeholder="時間を指定します">
          <label for="default-picker">時間</label>
        </div>
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">投稿</button>
      </form>
    </div>
  </div>
</div>

</div>
</div>

@endsection