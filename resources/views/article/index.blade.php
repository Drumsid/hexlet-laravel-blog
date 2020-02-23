@extends('layouts.app')

@section('title', 'Статьи')

@section('content')
<h1>Список статей</h1>
<p>Поиск по статьям</p>
    {{Form::open(['url' => route('articles.index'), 'method' => 'GET'])}}
        {{Form::text('q', $q)}}
        {{Form::submit('найти')}}
    {{Form::close()}}
    <br>
    {{Form::open(['url' => route('articles.index'), 'method' => 'GET'])}}
        {{Form::submit('очистить форму')}}
    {{Form::close()}}
@foreach ($articles as $article)
    <a href="{{route('articles.show', $article)}}">
        <h2>{{$article->name}}</h2>
    </a>

    {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
    {{-- Используется для очень длинных текстов, которые нужно сократить --}}
    <div>{{Str::limit($article->body, 200)}}</div>
@endforeach
<br><br><br>
<a href="{{ route('articles.create') }}">Создать статью</a><br>
{{ $articles->links() }}
@endsection
