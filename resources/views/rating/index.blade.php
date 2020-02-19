{{-- BEGIN --}}
@extends('layouts.app')

@section('title', 'Рейтинг')

@section('content')
    <h1>Рейтинг</h1>
    <p>Сортировка по <a href="/testFromBd">умолчанию</a></p>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Название</td>
                    <td>Число лайков</td>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->name}}</td>
                        <td>{{$article->likes_count}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>
@endsection
{{-- END --}}