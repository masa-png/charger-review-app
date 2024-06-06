@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
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
                            <label for="review-img" class="mb-3">プロフィール画像を編集</label>
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
                    <div class="card mb-3">
                        <div class="card-header text-center">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" href="">投稿した記事</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">いいねした記事</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            @if ($reviews !== null)
                                @foreach ($reviews as $review)
                                    <div class="mt-4">
                                        <small class="text-body-secondary">{{ $review->updated_at }}</small><br>
                                        <h4 class="card-subtitle my-2 text-body-secondary">{{ $review->title }}
                                        </h4>
                                        <p>
                                            <a href="{{ route('reviews.index', ['review' => $review->product_id]) }}">詳細</a>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="{{ route('mypage.edit_review', ['review' => $review->product_id]) }}">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </div>
                                    <hr>
                                @endforeach
                            @else
                                <p>投稿したレビュー記事はありません。</p>
                            @endif
                        </div>
                    </div>
                    {{ $reviews->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
