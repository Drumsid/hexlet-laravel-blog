@extends('layouts.app')

@section('title', 'Создать статью')

@section('content')
<h1>Создать статью</h1>
{{ Form::model($article, ['url' => route('articles.store')]) }}

    @include('article.form')
    
    {{ Form::submit('Создать') }}
{{ Form::close() }}
<p>Поле state надо переделать в миграции, чтоб было значение по умолчанию</p>
@endsection
