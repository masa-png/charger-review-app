@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-2">
                @component('components.sidebar', ['vendors' => $vendors, 'wattages' => $wattages])
                @endcomponent
            </div>
            <div class="col-md-10">
                @if ($vendor !== null)
                    <nav class="my-5" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">投稿一覧</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $vendor->name }}</li>
                        </ol>
                    </nav>
                    <h2 class="mb-4">{{ $vendor->name }}の投稿一覧{{ $products->count() }}件</h2>
                @elseif ($wattage !== null)
                    <nav class="my-5" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">投稿一覧</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $wattage->watt }}</li>
                        </ol>
                    </nav>
                    <h2 class="mb-4">{{ $wattage->watt }}Wの投稿一覧{{ $products->count() }}件</h2>
                @elseif ($keyword !== null)
                    <nav class="my-5" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">投稿一覧</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $keyword }}</li>
                        </ol>
                    </nav>
                    <h2 class="mb-4">{{ $keyword }}の検索結果{{ $products->count() }}件</h2>
                @else
                    <h2 class="pt-5 mb-4">投稿一覧</h2>
                @endif

                @if (session('flash_message'))
                    <div class="alert alert-info">
                        {{ session('flash_message') }}
                    </div>
                @endif

                <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card h-100">
                                <a href="{{ route('reviews.index', ['review' => $product->id]) }}">
                                    <img src="{{ $product->image_path ? $product->image_path : asset('img/IMG_0835.jpeg') }}"
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
