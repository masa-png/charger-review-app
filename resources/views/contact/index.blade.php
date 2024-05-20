@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-3">お問い合わせ</h1>

                <hr class="mb-4">

                <form action="" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <input name="name" type="text" class="form-control form-input" value="{{ old('name') }}"
                            autofocus placeholder="お名前">
                    </div>

                    <div class="form-group mb-3">
                        <input name="email" type="email" class="form-control form-input" value="{{ old('email') }}"
                            placeholder="メールアドレス">
                    </div>

                    <div class="form-group mb-3">
                        <input name="title" type="text" class="form-control form-input" value="{{ old('title') }}"
                            placeholder="お問い合わせ件名">
                    </div>

                    <div class="form-group mb-3">
                        <textarea name="content" class="form-control form-input" value="{{ old('content') }}" placeholder="お問い合わせ内容"></textarea>
                    </div>

                    <hr class="mb-4">

                    <div class="form-group">
                        <button type="submit" class="btn submit-button w-100 text-white">
                            送信
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
