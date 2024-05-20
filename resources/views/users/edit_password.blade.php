@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('mypage') }}">マイページ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">パスワード変更</li>
                    </ol>
                </nav>

                <h1 class="mb-3">パスワード変更</h1>

                <hr class="mb-4">

                <form action="{{ route('mypage.update_password') }}" method="POST">
                    @csrf

                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group row mb-3">
                        <label for="password" class="col-md-5 col-form-label text-md-left fw-medium">新しいパスワード</label>

                        <div class="col-md-7">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror login-input" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="password-confirm"
                            class="col-md-5 col-form-label text-md-left fw-medium">新しいパスワード(確認用)</label>

                        <div class="col-md-7">
                            <input type="password" name="password_confirmation" id="password-confirm"
                                class="form-control login-input" required autocomplete="new-password">
                        </div>
                    </div>

                    <hr class="mb-4">

                    <button type="submit" class="btn submit-button w-100 text-white">
                        変更
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
