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
                        <div class="img-box">
                            <img src="{{ $user->image_path ? $user->image_path : asset('img/IMG_0835.jpeg') }}"
                                class="card-img-top rounded-circle w-50" alt="プロフィール画像">
                        </div>
                        <form action="{{ route('mypage.update_image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="card-body">
                                <label for="profile-img" class="mb-3">プロフィール画像を設定</label>
                                <input id="profile-img" name="profile_image" type="file" required
                                    class="form-control @error('profile_image') is-invalid @enderror form-input">

                                @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </span>
                                @enderror
                                <div class="form-group">
                                    <button type="submit" class="btn submit-button text-white mt-3">設定</button>
                                </div>
                            </div>
                        </form>

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
                    <div class="card text-center mb-3">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" href="">投稿した記事</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">いいねした記事</a>
                                </li>
                            </ul>
                        </div>

                        @if ($reviews !== null)
                            <div class="card-body">
                                @foreach ($reviews as $review)
                                    <div class="mt-4">
                                        <small class="text-body-secondary">{{ $review->updated_at }}</small><br>
                                        <h4 class="card-subtitle my-2 text-body-secondary">{{ $review->title }}
                                        </h4>
                                        <p>
                                            <a
                                                href="{{ route('reviews.index', ['review' => $review->product_id]) }}">詳細</a>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="{{ route('mypage.edit_review', ['review' => $review->product_id]) }}">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        @else
                            <div class="card-body">
                                <p class="card-text">投稿したレビュー記事はありません。</p>
                            </div>
                        @endif
                    </div>
                    {{ $reviews->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
