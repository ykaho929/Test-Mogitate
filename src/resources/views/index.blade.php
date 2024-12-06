@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

<div class="Mogitate__content">
    <div class="Mogitate__heading">
        <h2>商品一覧</h2>
    </div>
    <div class="Mogitate__heading">
        <button class="add-button">+商品を追加</button>
    </div>

    <div class="Mogitate-search">
        <form class="search-form" action="/products/search" method="get">
            @csrf
            <input class="search-form__input" type="text" name="input" value="{{ $input }}" placeholder="商品名で検索">
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </form>
    </div>

    <div class="Mogitate-list">
    </div>

@endsection