@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

<div class="content">
    <div class="heading-ttl">
        <h2>商品一覧</h2>
    </div>
    <div class="heading-item">
        <a class="add-button" href="/products/register">+商品を追加</a>
    </div>

    <div class="product-search">
        <form class="search-form" action="/products/search" method="get">
            @csrf
            <input class="search-form__input" type="text" name="input" value="{{ $input }}" placeholder="商品名で検索">
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </form>
    </div>
    <div class="product-list">
        <div class="product-list-content">
            @foreach($products as $product)
            <a href="{{ route('products.show', $product) }}">
            <div class="product-list-content__item">
                <img src="{{ asset('storage/fruits-img/' . $product->image) }}" >
                <span class="product-name">{{ $product->name }}</span>
                <span class="product-price">￥{{ $product->price }}</span>               
            </div>
            @endforeach
        </div>
    </div>
    {{ $products->links('vendor.pagination.tailwind') }}
</div>

@endsection