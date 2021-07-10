<div class="md-form">
  <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $program->title ?? old('title') }}">
  </input>
  <label class="form-label" for="title">
    タイトル
  </label>
  @error('title')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message}}</strong>
  </span>
  @enderror
</div>
<div class="md-form">
  <input type="text" id="body" name="body" class="form-control @error('body') is-invalid @enderror" rows="4" value="{{ $program->body ?? old('body') }}">
  <label class="form-label" for="body">
    内容
  </label>
  @error('body')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message}}</strong>
  </span>
  @enderror
</div>
<div class="md-form">
  <input type="text" id="tag" name="tag" class="form-control @error('tag') is-invalid @enderror" value="{{ $program->tag ?? old('tag') }}">
  <label class="form-label" for="tag">
    タグ
  </label>
  @error('tag')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message}}</strong>
  </span>
  @enderror
</div>
<div class="md-form md-outline">
  <input value="{{ $program->start_date ?? old('start_date') }}" type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror">
  <label for="start_date">日付け</label>
  @error('start_date')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message}}</strong>
  </span>
  @enderror
</div>
<div class="md-form md-outline">
  <input type="time" id="start_time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ $program->start_time ?? old('start_time') }}">
  <label for="default-picker">時間</label>
  @error('start_time')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message}}</strong>
  </span>
  @enderror
</div>
<div class="custom-file">
  <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image_path" value="{{ $program->image_path ?? old('image_path')}}">
  <label class="custom-file-label" for="inputGroupFile01">画像を選択してください</label>
</div>