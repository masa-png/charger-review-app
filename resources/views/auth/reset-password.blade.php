@extends('layouts.app')
@section('content')
    <div class="container pt-2">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="mb-3">パスワードリセット</h2>

                <hr class="mb-4">

                <form action="{{ route('password.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group row mb-3">
                        <label for="email" class="col-md-5 col-form-label text-md-left fw-medium">メールアドレス</label>
                        <div class="col-md-7">
                            <input type="email" id="email"
                                class="form-control @error('email') is-invalid @enderror login-input" name="email"
                                value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>メールアドレスが正しくない可能性があります。</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="password" class="col-md-5 col-form-label text-md-left fw-medium">新しいパスワード</label>

                        <div class="col-md-7">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password')
                                is-invalid @enderror login-input"
                                required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="password_confirmation"
                            class="col-md-5 col-form-label text-md-left fw-medium">新しいパスワード(確認用)</label>
                        <div class="col-md-7">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control login-input" required autocomplete="new-password">
                        </div>
                    </div>

                    <hr class="mb-4">

                    <button type="submit" class="btn submit-button w-100 text-white">
                        リセット
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
