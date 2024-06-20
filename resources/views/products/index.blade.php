@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <nav class="my-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('top') }}">トップ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">投稿一覧</li>
                </ol>
            </nav>

            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-header">メーカー名で探す</div>
                    <div class="card-body">
                        <form action="{{ route('products.index') }}" method="GET">
                            <div class="form-group mb-3">
                                <select name="vendor_id" class="form-control form-select" required>
                                    <option value="" hidden>選択してください</option>
                                    @foreach ($vendors as $vendor)
                                        @if ($vendor->id == $vendor_id)
                                            <option value="{{ $vendor->id }}" selected>{{ $vendor->name }}</option>
                                        @else
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn submit-button text-white shadow-sm w-100">検索</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">W数で探す</div>
                    <div class="card-body">
                        <form action="{{ route('products.index') }}" method="GET">
                            <div class="form-group mb-3">
                                <select name="wattage_id" class="form-control form-select" required>
                                    <option value="" hidden>選択してください</option>
                                    @foreach ($wattages as $wattage)
                                        @if ($wattage->id == $wattage_id)
                                            <option value="{{ $wattage->id }}" selected>{{ $wattage->watt }}W</option>
                                        @else
                                            <option value="{{ $wattage->id }}">{{ $wattage->watt }}W</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn submit-button text-white shadow-sm w-100">検索</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">種類で探す</div>
                    <div class="card-body">
                        <form action="{{ route('products.index') }}" method="GET">
                            <div class="form-group mb-3">
                                <select name="type_id" class="form-control form-select" required>
                                    <option value="" hidden>選択してください</option>
                                    @foreach ($types as $type)
                                        @if ($type->id == $type_id)
                                            <option value="{{ $type->id }}" selected>{{ $type->name }}タイプ</option>
                                        @else
                                            <option value="{{ $type->id }}">{{ $type->name }}タイプ</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn submit-button text-white shadow-sm w-100">検索</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">価格で探す</div>
                    <div class="card-body">
                        <form action="{{ route('products.index') }}" method="GET">
                            <div class="form-group mb-3">
                                <select name="price" class="form-control form-select" required>
                                    <option value="" hidden>選択してください</option>
                                    @for ($i = 0; $i < 100; $i++)
                                        {{ $each_price = 500 + 500 * $i }}
                                        @if ($each_price == $price)
                                            <option value="{{ $each_price }}" selected>{{ number_format($each_price) }}円
                                            </option>
                                        @else
                                            <option value="{{ $each_price }}">{{ number_format($each_price) }}円</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn submit-button text-white shadow-sm w-100">検索</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                @if (session('flash_message'))
                    <div class="alert alert-info">
                        {{ session('flash_message') }}
                    </div>
                @endif

                <div class="d-flex justify-content-between flex-wrap">
                    <h2 class="mb-3">
                        {{ $products->total() }}件の記事が見つかりました
                    </h2>
                    <form action="{{ route('products.index') }}" method="GET" class="mb-3">
                        @if ($keyword)
                            <input type="hidden" name="keyword" value="{{ $keyword }}">
                        @endif
                        @if ($vendor_id)
                            <input type="hidden" name="vendor_id" value="{{ $vendor_id }}">
                        @endif
                        @if ($wattage_id)
                            <input type="hidden" name="wattage_id" value="{{ $wattage_id }}">
                        @endif
                        @if ($type_id)
                            <input type="hidden" name="type_id" value="{{ $type_id }}">
                        @endif
                        @if ($price)
                            <input type="hidden" name="price" value="{{ $price }}">
                        @endif
                        <select class="form-select form-select-sm" name="select_sort" aria-label=".form-select-sm example"
                            onChange="this.form.submit();">
                            @foreach ($sorts as $key => $value)
                                @if ($sorted === $value)
                                    <option value="{{ $value }}" selected>{{ $key }}</option>
                                @else
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endif
                            @endforeach
                        </select>
                    </form>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card h-100">
                                <a href="{{ route('reviews.index', ['review' => $product->id]) }}">
                                    <img src="{{ $product->image_path ? $product->image_path : asset('img/壁挿し.jpg') }}"
                                        class="img-thumbnail card-img-top">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">メーカー名 {{ $product->vendor->name }}</h4>
                                    <h4 class="card-subtitle mb-2 text-body-secondary">{{ $product->name }}</h4>
                                    <p class="card-title">種類 {{ $product->type->name }}タイプ</p>
                                    <p class="card-title">W数 {{ $product->wattage->watt }}W</p>
                                    <label class="card-title">¥{{ number_format($product->price) }}</label><br>
                                </div>
                                <div class="card-footer">
                                    <small class="text-body-secondary">{{ $product->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
