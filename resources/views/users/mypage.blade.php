@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center mb-4">
            <div class="col-md-5">
                <h1>マイページ</h1>

                @if (session('flash_message'))
                    <div class="alert alert-success">
                        {{ session('flash_message') }}
                    </div>
                @endif

                <div class="container mt-3">
                    <div class="card text-center py-3 px-3" style="width: 26rem;">
                        <div>
                            <img src="" class="card-img-top" alt="プロフィール画像">
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-5 text-body-secondary">{{ $user->name }}</h6>
                            <a href="{{ route('mypage.create_review') }}"
                                class="btn btn-primary d-block mb-3 py-2">レビューを投稿する</a>

                            <a href="{{ route('mypage.edit') }}" class="btn btn-secondary d-block mb-3 py-2">会員情報を編集する</a>

                            <a href="{{ route('mypage.edit_password') }}"
                                class="btn btn-secondary d-block mb-3 py-2">パスワードを変更する</a>

                            <a href="{{ route('logout') }}" class="btn btn-danger d-block m-auto py-2 w-75"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container mt-4">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" class="nav-link active" aria-current="page">投稿した記事</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link active" aria-current="page">記事</a>
                        </li>
                    </ul>
                    <p class="mt-3">投稿した記事はありません</p>
                </div>

            </div>
        </div>
    </div>
@endsection
