@extends('layouts.app')

@section('title', 'Изменить статью')

@section('content')
<h1>Изменить статью</h1>
{{ Form::model($article, ['url' => route('articles.update', $article), 'method' => 'PATCH']) }}

    @include('article.form')
    
    {{ Form::submit('Изменить') }}
{{ Form::close() }}
<p>Поле state надо переделать в миграции, чтоб было значение по умолчанию</p>
@endsection