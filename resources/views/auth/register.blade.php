@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="mb-3">新規会員登録</h2>

                <hr class="mb-4">

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="form-group row mb-3">
                        <label for="name" class="col-md-5 col-form-label text-md-left fw-medium">ユーザー名<span
                                class="ms-1 require-input-label"><span
                                    class="require-input-label-text">必須</span></span></label>

                        <div class="col-md-7">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid
                            @enderror login-input"
                                value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="田中 太郎">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ユーザー名を入力してください</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="email" class="col-md-5 col-form-label text-md-left fw-medium">メールアドレス<span
                                class="ms-1 require-input-label"><span
                                    class="require-input-label-text">必須</span></span></label>

                        <div class="col-md-7">
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid
                            @enderror login-input"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="charger@charger.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>メールアドレスを入力してください</strong>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="password" class="col-md-5 col-form-label text-md-left fw-medium">パスワード<span
                                class="ms-1 require-input-label"><span
                                    class="require-input-label-text">必須</span></span></label>

                        <div class="col-md-7">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid
                            @enderror login-input"
                                required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="password-confirm" class="col-md-5 col-form-label text-md-left fw-medium">パスワード(確認用)<span
                                class="ms-1 require-input-label"><span
                                    class="require-input-label-text">必須</span></span></label>
                        <div class="col-md-7">
                            <input type="password" name="password_confirmation" id="password-confirm"
                                class="form-control login-input" required autocomplete="new-password">
                        </div>
                    </div>

                    <hr class="mb-4">

                    <button type="submit" class="btn submit-button w-100 text-white">
                        アカウント作成
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
