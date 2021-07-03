@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p class="h4 text-center py-4">ログイン</p>

                        <div class="md-form">

                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input id="materialFormCardEmailEx" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="materialFormCardEmailEx" class="font-weight-light">メール</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input id="materialFormCardPasswordEx" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="materialFormCardPasswordEx" class="font-weight-light">パスワード</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-around">

                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                パスワードを忘れた場合
                            </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">
                            ログイン
                        </button>
                        <hr>
                        <p class="h6 text-center py-4"><a href="{{ route('login.{provider}',['provider' => 'google']) }}">Google</a>でログイン</p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection