@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="tab-container">
    <div class="tabs">
        <a href="#" class="tab-link">おすすめ</a>
        <a href="#" class="tab-link">マイリスト</a>
    </div>
</div>

<div class="content">
    <div class="product-list">
        @for ($i = 0; $i < 6; $i++)
        <a href="/item/{{ $i + 1 }}" class="product-card-link">
            <div class="product-card">
                <div class="product-image">
                    <span>商品画像</span>
                </div>
                <div class="product-name">商品名</div>
            </div>
        </a>
        @endfor
    </div>
</div>
@endsection
