@extends('layouts.main')

@section('content')
    <main role="main">

        <div class="jumbotron">
            <h1 class="display-3">Сервис вопросов/ответов</h1>
            <p class="lead">Данный сайт написан на PHP фреймворке Laravel + WEB фреймворке Bootstrap</p>
            <p><a target="_blank" class="btn btn-lg btn-warning" href="https://laravel.com/docs/5.5" role="button">Официальная документация фреймворка Laravel</a></p>
            <p><a target="_blank" class="btn btn-lg btn-primary" href="http://getbootstrap.com/docs/4.0/getting-started/introduction/" role="button">Официальная документация фреймворка Bootstrap</a></p>
        </div>

        <h1>
            <div class="text-center">Последние вопросы</div>
        </h1>

        <div class="list-group">
            @foreach($questions as $question)
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">
                        <a href="{{ route('show',['id'=>$question->id]) }}">
                            {{ $question->title }}
                        </a>
                    </h4>
                    <div class="float-right">
                        @if ($question->name)
                        <span class="badge badge-success">Автор : {{ $question->name }}</span>
                        @else
                            <span class="badge badge-secondary">Анонимный пользователь</span>
                        @endif
                    </div>
                    <div class="float-left">
                        <div>
                            <span class="badge badge-secondary">{{ $question->created_at }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
@endsection

@section('title', 'Вопросы - Главная')