<div class="md-form">
  <input type="text" id="title" name="title" class="form-control" value="{{ $program->title ?? old('title') }}">
  </input>
  <label class="form-label" for="title">
    タイトル
  </label>
</div>
<div class="md-form">
  <input type="text" id="body" name="body" class="form-control" rows="4" value="{{ $program->body ?? old('body') }}">
  <label class="form-label" for="body">
    内容
  </label>
</div>
<div class="md-form">
  <input type="text" id="tag" name="tag" class="form-control" value="{{ $program->tag ?? old('tag') }}">
  <label class="form-label" for="tag">
    タグ
  </label>
</div>
<div class="md-form md-outline">
  <input value="{{ $program->start_date ?? old('start_date') }}" type="date" id="start_date" name="start_date" class="form-control">
  <label for="start_date">日付け</label>
</div>
<div class="md-form md-outline">
  <input type="time" id="start_time" class="form-control" name="start_time" value="{{ $program->start_time ?? old('start_time') }}">
  <label for="default-picker">時間</label>
</div>