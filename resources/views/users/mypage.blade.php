@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center mb-4">
            <div class="col-md-5">
                <h2 class="text-center">マイページ</h2>

                @if (session('flash_message'))
                    <div class="alert alert-success">
                        {{ session('flash_message') }}
                    </div>
                @endif

                <div class="container mt-3">
                    <div class="card text-center m-auto py-3 px-3" style="width: 26rem;">
                        <div>
                            <img src="" class="card-img-top" alt="プロフィール画像">
                        </div>
                        <div class="card-body">
                            <label for="review-img" class="mb-3">画像をアップロード</label>
                            <input id="review-img" name="file" type="file" class="form-control form-input"></input>
                        </div>

                        <div class="card-body">
                            <h6 class="card-subtitle mb-5 text-body-secondary">{{ $user->name }}</h6>
                            <a href="{{ route('mypage.create_review') }}"
                                class="btn submit-button d-block mb-3 py-2 text-white">レビューを投稿する</a>

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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="post-tab" data-bs-toggle="tab"
                                data-bs-target="#post-tab-pane" type="button" role="tab" aria-controls="post-tab-pane"
                                aria-selected="true">投稿した記事</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="good-tab" data-bs-toggle="tab" data-bs-target="#good-tab-pane"
                                type="button" role="tab" aria-controls="good-tab-pane"
                                aria-selected="false">いいねした記事</button>
                        </li>
                    </ul>
                    <div class="tab-content border border-2" id="myTabContent">
                        <div class="tab-pane fade show active my-3 mx-3" id="post-tab-pane" role="tabpanel"
                            aria-labelledby="post-tab" tabindex="0">投稿した記事はありません</div>

                        <div class="tab-pane fade my-3 mx-3" id="good-tab-pane" role="tabpanel" aria-labelledby="good-tab"
                            tabindex="0">いいねした記事はありません</div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
