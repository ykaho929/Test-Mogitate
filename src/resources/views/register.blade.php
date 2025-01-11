@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
<div class="Mogitate__content">
    <div class="Mogitate__heading-ttl">
        <h2>商品登録</h2>
    </div>
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form__group-title">
            <span class="form__label--item">商品名</span>
            <span class="form__label--required">必須</span>
        </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}" />
                </div>
            <div class="form__error">
              @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group-title">
            <span class="form__label--item">値段</span>
            <span class="form__label--required">必須</span>
        </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}" />
                </div>
            <div class="form__error">
                @error('price')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group-title">
            <span class="form__label--item">商品画像</span>
            <span class="form__label--required">必須</span>
        </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="file" name="image"  value="{{ old('image') }}" >
                </div>
            <div class="form__error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group-title">
            <span class="form__label--item">季節</span>
            <span class="form__label--required">必須</span>
        </div>
            <div class="form__group-content">
            @foreach ($seasons as $season)
                <input type="checkbox" name="seasons[]" value="{{ $season->id }}" >
                {{ $season->name }}
            @endforeach
            <div class="form__error">
                @error('seasons')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__group-title">
            <span class="form__label--item">商品説明</span>
            <span class="form__label--required">必須</span>
        </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="description" placeholder="商品の説明を入力" value="{{ old('description') }}" />
                </div>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>    

        <div class="resister-form__btn-inner">
            <a class="resister-form__back-btn" href="/products">戻る</a>
            <input class="resister-form__add-btn" type="submit" value="登録" name="send">
        </div>
    </form>
</div>
@endsection