<!-- Хранится в resources/views/about.blade.php -->

@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('title', 'test BD')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
<h1>Тестовый запрос из базы данных</h1>

@foreach ($articles as $article)
<h2>{{ $article->name }}</h2>
<div>{{ $article->body }}</div>
@endforeach

@endsection