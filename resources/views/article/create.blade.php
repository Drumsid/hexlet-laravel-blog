@extends('layouts.app')

@section('title', 'Создать статью')

@section('content')
<h1>Создать статью</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::model($article, ['url' => route('articles.store')]) }}
    {{ Form::label('name', 'Название') }}
    {{ Form::text('name') }}<br>
    {{ Form::label('body', 'Содержание') }}
    {{ Form::textarea('body') }}<br>

    {{ Form::label('state', 'state') }}
    {{ Form::text('state', 'published') }}<br>

    {{ Form::submit('Создать') }}
{{ Form::close() }}
<p>Поле state надо переделать в миграции, чтоб было значение по умолчанию</p>
@endsection
