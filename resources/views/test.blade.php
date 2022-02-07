@extends('layouts.base')

@section('main')
    <main>
        <p>Категория: {{$cat->name}}</p>
        <p>Название товара: {{$prod->name}}</p>
        <p>Описание товара: {{$prod->description}}</p>
        <p>Цена товара: {{$prod->price}}</p>
        <p>Характиристики товара:</p>
        {{dd($charac)}}
        @foreach($cat->attributes as $attr)
            <b>{{$attr->title}}:</b>
            @foreach($charac[$attr->title] as $v)
                <p>{{$v->slug}}</p>
            @endforeach
        @endforeach
    </main>
@endsection
