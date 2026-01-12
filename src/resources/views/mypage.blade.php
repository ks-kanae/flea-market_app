@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage__header">
    <div class="profile-section">
    @if(Auth::user()->profile && Auth::user()->profile->profile_image)
        <img class="profile-avatar" src="{{ asset('storage/' . Auth::user()->profile->profile_image) }}">
    @else
        <div class="profile-avatar"></div>
    @endif
        <h1 class="profile-name">{{ Auth::user()->name }}</h1>
    </div>
    <a href="/mypage/profile" class="edit-profile-button">プロフィールを編集</a>
</div>

<div class="tab-container">
    <div class="tabs">
        <a href="#" class="tab-link">出品した商品</a>
        <a href="#" class="tab-link">購入した商品</a>
    </div>
</div>

<div class="content">
    <div class="product-list">
        @for ($i = 0; $i < 7; $i++)
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
