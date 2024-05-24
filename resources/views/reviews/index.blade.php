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
                        <div class="card h-100">
                            <a href="{{ route('reviews.show') }}">
                                <img src="{{ asset('img/IMG_0835.jpeg') }}" class="img-thumbnail card-img-top">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">メーカー名:CIO</h4>
                                <h4 class="card-subtitle mb-2 text-body-secondary">NovaPort</h4>
                                <h4 class="card-title">種類:</h4>
                                <h4 class="card-title">W数:</h4>
                                <h4 class="card-title">値段:</h4>
                                <small class="text-body-secondary">ユーザー名</small>
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
