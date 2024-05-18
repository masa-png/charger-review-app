@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="mb-3">ログイン</h2>

                @if (session('warning'))
                    <div class="alert alert-danger">
                        {{ session('warning') }}
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <hr class="mb-4">

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <input type="email" id="email"
                            class="form-control @error('email') is-invalid @enderror login-input" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                        @error('email')
                            <span class="in-valid-feedback" role="alert">
                                <strong>メールアドレスが正しくない可能性があります。</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" id="password"
                            class="form-control @error('password') is-invalid @enderror login-input" name="password"
                            required autocomplete="current-password" placeholder="パスワード">

                        @error('password')
                            <span class="in-valid-feedback" role="alert">
                                <strong>パスワードが正しくない可能性があります。</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label check-label w-100" for="remember">
                                次回から自動的にログインする
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn submit-button w-100 text-white mb-4">
                        ログイン
                    </button>
                </form>

                <div class="text-center">
                    <a href="{{ route('password.request') }}" class="fw-bold">
                        パスワードをお忘れの場合
                    </a>
                </div>

                <hr class="mb-4">

                <div class="text-center">
                    <a href="{{ route('register') }}" class="fw-bold">
                        新規会員登録
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
