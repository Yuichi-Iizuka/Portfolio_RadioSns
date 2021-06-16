@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <p class="h4 text-center py-4">ユーザー登録</p>
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input id="materialFormCardNameEx" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="materialFormCardNameEx" class="font-weight-light">名前</label>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input id="materialFormCardNameEx" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="materialFormCardNameEx" class="font-weight-light">メール</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input id="materialFormCardNameEx" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <label for="materialFormCardPasswordEx" class="font-weight-light">パスワード</label>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fa fa-exclamation-triangle prefix grey-text"></i>

                            <input id="materialFormCardPasswordEx" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <label for="materialFormCardPasswordEx" class="font-weight-light">パスワード確認</label>
                        </div>

                        <button type="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">
                            登録
                        </button>
                        <p class="h6 text-center py-4">またはこちらで登録</p>
                        <a href="{{ route('login.{provider}',['provider' => 'google']) }}"><i class="fab fa-google"></i></a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
@endsection