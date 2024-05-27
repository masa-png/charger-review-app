@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('mypage') }}">マイページ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">レビュー投稿</li>
                    </ol>
                </nav>

                <h2 class="mb-3">レビュー投稿</h2>

                <hr class="mb-4">

                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <select name="vendor_id" class="form-select review-input" aria-label="メーカー名">
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <input name="name" type="text" class="form-control review-input" value="{{ old('name') }}"
                            autofocus placeholder="商品名">
                    </div>

                    <div class="form-group mb-3">
                        <select name="type_id" class="form-select review-input" aria-label="種類">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <select name="wattage_id" class="form-select review-input" aria-label="W数">
                            @foreach ($wattages as $wattage)
                                <option value="{{ $wattage->id }}">{{ $wattage->watt }}W</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <input name="price" type="number" class="form-control review-input" value="{{ old('price') }}"
                            placeholder="値段">
                    </div>

                    {{-- <div class="form-group mb-3">
                        <input type="text" class="form-control review-input" placeholder="商品のリンク先">
                    </div> --}}

                    <div class="form-group mb-3">
                        <select name="score" class="form-select review-input review-score-color" aria-label="★評価">
                            <option value="5" selected>★★★★★</option>
                            <option value="4">★★★★</option>
                            <option value="3">★★★</option>
                            <option value="2">★★</option>
                            <option value="1">★</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <input name="title" type="text" class="form-control review-input" value="{{ old('title') }}"
                            placeholder="タイトル">
                    </div>

                    <div class="form-group mb-3">
                        <textarea name="content" class="form-control review-input" value="{{ old('content') }}" placeholder="レビュー内容"></textarea>
                    </div>

                    {{-- <div class="row my-3">
                        <div class="card w-75 m-auto">
                            <div class="card-body">
                                <label for="review-img" class="mb-3">画像をアップロード</label>
                                <input id="review-img" name="file" type="file"
                                    class="form-control review-input"></input>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <button type="submit" class="btn submit-button w-100 text-white">
                            投稿
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
