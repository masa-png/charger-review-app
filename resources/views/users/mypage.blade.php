@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
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
                            <img src="{{ $user->image_path ? $user->image_path : url('https://product-review-user.s3.ap-northeast-1.amazonaws.com/profiles/79AAE03E-12F1-4833-8B88-F57CC41C5D69_1_201_a.jpeg') }}"
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

                <div class="card mt-5">
                    <div class="card-body px-0">
                        <ul class="nav nav-underline ps-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="post-tab" data-bs-toggle="tab"
                                    data-bs-target="#post-tab-pane" type="button" role="tab"
                                    aria-controls="post-tab-pane" aria-selected="true">投稿した記事</button>
                            </li>
                            <li class="nav-item">
                                {{-- <button class="nav-link" id="good-tab" data-bs-toggle="tab" data-bs-target="#good-tab-pane"
                                    type="button" role="tab" aria-controls="good-tab-pane"
                                    aria-selected="false">いいねした記事</button> --}}
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="post-tab-pane" role="tabpanel"
                                aria-labelledby="post-tab" tabindex="0">

                                @if ($reviews->count() == 0)
                                    <div class="my-4 ps-4">
                                        <p>投稿したレビュー記事はありません。</p>
                                    </div>
                                @endif

                                @foreach ($reviews as $review)
                                    <div class="ps-4">
                                        <div class="mt-4">
                                            <h4 class="card-subtitle my-2 text-body-secondary">{{ $review->title }}</h4>
                                            <small class="text-body-secondary">{{ $review->updated_at }}</small><br>
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
                                    </div>
                                    <hr>
                                @endforeach
                                <div class="ps-4">
                                    {{ $reviews->appends(request()->query())->links() }}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="good-tab-pane" role="tabpanel" aria-labelledby="good-tab"
                                tabindex="0">
                                <div class="my-4 ps-4">
                                    <p>いいねしたレビュー記事はありません。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
