@extends('layouts.app')
@section('content')
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-2">
                @component('components.sidebar')
                @endcomponent
            </div>

            <div class="col">
                <h2 class="pt-5">投稿一覧</h2>

                @if (session('flash_message'))
                    <div class="alert alert-info">
                        {{ session('flash_message') }}
                    </div>
                @endif

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card w-75 h-100">
                            <a href="{{ route('reviews.show') }}">
                                <img src="{{ asset('img/IMG_0835.jpeg') }}" class="img-thumbnail card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">メーカー名:</h5>
                                <h5 class="card-title">商品名:</h5>
                                <h5 class="card-title">W数:</h5>
                                <h5 class="card-title">値段:</h5>
                                <h5 class="card-title">投稿者:</h5>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
