@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
@if (session('success'))
    <div class="profile__alert--success">
        {{ session('success') }}
    </div>
@endif
<div class="profile-container">
    <h2 class="profile-heading">プロフィール設定</h2>

    <form class="profile-form h-adr" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" >
    @csrf
        <span class="p-country-name" hidden>Japan</span>

        <div class="profile-picture-group">
            @if(Auth::user()->profile && Auth::user()->profile->profile_image)
            <img class="profile-picture"
            src="{{ asset('storage/' . Auth::user()->profile->profile_image) }}"
            alt="プロフィール画像">
            @else
            <div class="profile-picture placeholder"></div>
            @endif
            <div class="profile-picture-button-wrapper">
                <label for="profile_image" class="profile-picture-button">画像を選択する</label>
                <input type="file" name="profile_image" id="profile_image" hidden>
            </div>
        </div>

        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}">
            @error('name')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="postcode">郵便番号</label>
            <input type="text" name="postcode" id="postcode" class="p-postal-code" value="{{ old('postcode', Auth::user()->profile->postcode ?? '') }}">
            @error('postcode')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">住所</label>
            <input type="text" name="address" id="address" class="p-region p-locality p-street-address" value="{{ old('address', Auth::user()->profile->address ?? '') }}">
            @error('address')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="building">建物名</label>
            <input type="text" name="building" id="building" value="{{ old('building', Auth::user()->profile->building ?? '') }}">
            @error('building')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="update-button">更新する</button>
    </form>
</div>
@endsection
