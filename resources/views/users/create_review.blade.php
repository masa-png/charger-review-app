@extends('layouts.app')
@section('content')
    <div class="container my-4">
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

                <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <select name="vendor_id" class="form-select review-input" aria-label="メーカー名">
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <input list="product_list" name="name"
                            class="form-control form-select review-input @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="商品名" required>

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
                            required placeholder="値段">
                    </div>

                    <div class="form-group mb-3">
                        <select name="score" class="form-select review-input review-score-color" aria-label="★評価">
                            @for ($i = 5; $i >= 1; $i--)
                                @if ($i == 5)
                                    <option value="{{ $i }}" selected>{{ str_repeat('★', $i) }}
                                    </option>
                                @else
                                    <option value="{{ $i }}">{{ str_repeat('★', $i) }}</option>
                                @endif
                            @endfor
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <input name="title" type="text"
                            class="form-control @error('title') is-invalid @enderror review-input"
                            value="{{ old('title') }}" required placeholder="タイトル">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>タイトルは50文字以内で入力してください。</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror review-input" required
                            rows="6" placeholder="レビュー内容(使用感・商品のURL等)">{{ old('content') }}</textarea>

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>レビュー内容は200文字以内で入力してください。</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="card w-75 m-auto my-3">
                        <div class="card-body">
                            <label for="product-img" class="mb-3">画像を選択</label>
                            <input id="product-img" name="image" type="file"
                                class="form-control @error('image') is-invalid @enderror review-input" required>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </span>
                            @enderror
                        </div>
                    </div>

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
