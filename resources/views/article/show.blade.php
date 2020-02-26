@extends('layouts.app')

@section('title', 'Статья ' . $article->name)

@section('content')
    <h1>{{$article->name}}</h1>
    <div>{{$article->body}}</div>

    <a href="{{route('articles.edit', $article)}}">
        <h2>Edit article</h2>
    </a>
    <a class = "myDel" href="{{ route('articles.destroy', $article) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">
        Удалить статью
    </a>
@endsection