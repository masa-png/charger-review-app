@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-3">お問い合わせ</h2>

                <hr class="mb-4">

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <input name="name" type="text" class="form-control form-input" value="{{ old('name') }}"
                            autofocus placeholder="お名前(任意)">
                    </div>

                    <div class="form-group mb-3">
                        <input name="email" type="email" class="form-control form-input" value="{{ old('email') }}"
                            placeholder="メールアドレス(任意)">
                    </div>

                    <div class="form-group mb-3">
                        <textarea name="content" class="form-control form-input" value="{{ old('content') }}" required placeholder="お問い合わせ内容"></textarea>
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
