@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-body">
          <form method="POST" action="{{ route('mypage.update',$user->id) }}">
            @csrf
            @method('patch')
            <p class="h4 text-center py-4">プロフィール編集</p>

            <div class="md-form">
              <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input id="materialFormCardNameEx" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                <label for="materialFormCardNameEx" class="font-weight-light">名前</label>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="md-form">
              <i class="fa fa-envelope prefix grey-text"></i>
              <input id="materialFormCardNameEx" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
              <label for="materialFormCardNameEx" class="font-weight-light">メール</label>

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">編集</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection