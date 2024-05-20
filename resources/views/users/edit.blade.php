@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('mypage') }}">マイページ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">会員情報の編集</li>
                    </ol>
                </nav>

                <h1 class="mb-3">会員情報の編集</h1>

                <hr class="mb-4">

                <form action="{{ route('mypage') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group row mb-3">
                        <label for="name" class="col-md-5 col-form-label text-md-left fw-medium">ユーザー名<span
                                class="ms-1 require-input-label"><span
                                    class="require-input-label-text">必須</span></span></label>
                        <div class="col-md-7">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror login-input"
                                value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="田中 太郎">

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
                                class="form-control @error('email') is-invalid @enderror login-input"
                                value="{{ $user->email }}" required autocomplete="email" autofocus
                                placeholder="charger@charger.com">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <strong>メールアドレスを入力してください</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <button type="submit" class="btn submit-button w-100 text-white">
                        保存
                    </button>
                </form>

                <hr class="my-4">

                <div class="text-center">
                    <a href="#" class="link-dark" data-bs-toggle="modal" data-bs-target="#deleteUserConfirmModal">
                        退会する
                    </a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="deleteUserConfirmModal" tabindex="-1"
                    aria-labelledby="deleteUserConfirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="deleteUserConfirmModalLabel">本当に退会しますか？</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center mb-0">一度退会するとデータはすべて削除され、<br>復旧はできません。</p>
                            </div>
                            <form action="{{ route('mypage.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link link-dark text-decoration-none"
                                        data-bs-dismiss="modal">キャンセル</button>
                                    <button type="submit" class="btn bg-danger text-white">退会する</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
