@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('content')
    <div class="product-detail">
        <form class="update-form" action="/products/update" method="POST">
            @method('PATCH')
            @csrf
        <div class="update-form__item">
            <div class="product-list-content__item">
                <a class="item__ttl"></a>
                    <img src="{{ asset('storage/fruits-img/' . $product->image) }}" alt="{{ $product->name }}">
                    <input type="file" name="image">
                <a class="item__ttl">商品名</a>
                    <input class="update-form__item-input" type="text" name="name" value="{{ $product['name'] }}">
                <a class="item__ttl">価格</a>
                    <input class="update-form__item-input" type="text" name="price" value="{{ $product['price'] }}">
                <a class="item__ttl">季節</a>
                    <div class="product-season">
                    @foreach ($seasons as $season)
                        <input type="checkbox" name="seasons[]" value="{{ $season->id }}">
                        {{ $season->name }}
                    @endforeach
                    </div>
                <a class="item__ttl">商品説明</a>
                    <input class="update-form__item-input" type="text" name="description" value="{{ $product['description'] }}">
            </div>
        </div>
    </div>
@endsection