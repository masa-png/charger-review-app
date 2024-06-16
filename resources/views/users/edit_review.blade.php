@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('mypage') }}">マイページ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">レビュー投稿編集</li>
                    </ol>
                </nav>

                <h2 class="mb-3">レビュー投稿編集</h2>

                <hr class="mb-4">

                <form action="{{ route('reviews.update', $review) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <select name="vendor_id" class="form-select review-input" aria-label="メーカー名">
                            @foreach ($vendors as $vendor)
                                @if ($vendor->id == $review->product->vendor_id)
                                    <option value="{{ $vendor->id }}" selected>{{ $vendor->name }}</option>
                                @else
                                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <input list="product_list" name="name"
                            class="form-control @error('name') is-invalid @enderror review-input"
                            value="{{ $review->product->name, old('name') }}" placeholder="商品名" required>

                        <datalist id="product_list">
                            @foreach ($products as $product)
                                <option value="{{ $product->name }}">{{ $product->name }}</option>
                            @endforeach
                        </datalist>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>商品名は50文字以内で入力してください。</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <select name="type_id" class="form-select review-input" aria-label="種類">
                            @foreach ($types as $type)
                                @if ($type->id == $review->product->type_id)
                                    <option value="{{ $type->id }}" selected>{{ $type->name }}タイプ</option>
                                @else
                                    <option value="{{ $type->id }}">{{ $type->name }}タイプ</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <select name="wattage_id" class="form-select review-input" aria-label="W数">
                            @foreach ($wattages as $wattage)
                                @if ($wattage->id == $review->product->wattage_id)
                                    <option value="{{ $wattage->id }}" selected>{{ $wattage->watt }}W</option>
                                @else
                                    <option value="{{ $wattage->id }}">{{ $wattage->watt }}W</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <input name="price" type="number" class="form-control review-input"
                            value="{{ $review->product->price, old('price') }}" required placeholder="値段">
                    </div>

                    {{-- <div class="form-group mb-3">
                        <input type="text" class="form-control review-input" placeholder="商品のリンク先">
                    </div> --}}

                    <div class="form-group mb-3">
                        <select name="score" class="form-select review-input review-score-color" aria-label="★評価">
                            <option value="5">★★★★★</option>
                            <option value="4">★★★★</option>
                            <option value="3">★★★</option>
                            <option value="2">★★</option>
                            <option value="1">★</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <input name="title" type="text"
                            class="form-control @error('title') is-invalid @enderror review-input"
                            value="{{ $review->title, old('title') }}" required placeholder="タイトル">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>タイトルは50文字以内で入力してください。</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror review-input" required
                            placeholder="レビュー内容">{{ $review->content, old('content') }}</textarea>

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>レビュー内容は200文字以内で入力してください。</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row my-3">
                        <div class="card w-75 m-auto">
                            <div class="card-body">
                                <label for="review-img" class="mb-3">画像を選択</label>
                                <input id="review-img" name="image" type="file"
                                    class="form-control @error('image') is-invalid @enderror review-input">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="product_id" value="{{ $review->product_id }}">
                    <input type="hidden" name="user_id" value="{{ $review->user_id }}">

                    <div class="form-group">
                        <button type="submit" class="btn submit-button w-100 text-white">
                            編集
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
