@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="item-detail">
    <div class="item-detail__container">
        <div class="item-detail__left">
            <div class="item-image">
                <span>商品画像</span>
            </div>
        </div>

        <div class="item-detail__right">
            <h1 class="item-name">商品名がここに入る</h1>
            <p class="item-brand">ブランド名</p>
            <p class="item-price">¥47,000 <span class="tax">(税込)</span></p>

            <div class="item-actions">
                <button class="action-button">
                    <img src="{{ asset('img/ハートロゴ_デフォルト.png') }}" alt="いいね" class="action-icon">
                    <span class="count">3</span>
                </button>
                <button class="action-button">
                    <img src="{{ asset('img/ふきだしロゴ.png') }}" alt="コメント" class="action-icon">
                    <span class="count">1</span>
                </button>
            </div>

            <button class="purchase-button">購入手続きへ</button>

            <div class="item-description">
                <h2 class="section-title">商品説明</h2>
                <p class="description-text">カラー：グレー</p>
                <p class="description-text">新品<br>商品の状態は良好です。傷もありません。</p>
                <p class="description-text">購入後、即発送いたします。</p>
            </div>

            <div class="item-info">
                <h2 class="section-title">商品の情報</h2>
                <div class="info-row">
                    <span class="info-label">カテゴリー</span>
                    <div class="info-value">
                        <span class="category-tag">洋服</span>
                        <span class="category-tag">メンズ</span>
                    </div>
                </div>
                <div class="info-row">
                    <span class="info-label">商品の状態</span>
                    <span class="info-value">良好</span>
                </div>
            </div>

            <div class="comments">
                <h2 class="section-title">コメント(1)</h2>
                <div class="comment-item">
                    <div class="comment-header">
                        <div class="comment-avatar"></div>
                        <span class="comment-author">admin</span>
                    </div>
                    <p class="comment-text">こちらにコメントが入ります。</p>
                </div>
            </div>

            <div class="comment-form">
                <h2 class="section-title">商品へのコメント</h2>
                <textarea class="comment-textarea" placeholder="コメントを入力"></textarea>
                <button class="comment-submit">コメントを送信する</button>
            </div>
        </div>
    </div>
</div>
@endsection
