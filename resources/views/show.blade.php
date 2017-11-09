@extends('layouts.main')

@section('content')
    <main role="main">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $questions->title }}</li>
            </ol>
        </nav>

        <h1>{{ $questions->title }}</h1>
        <div>{!! nl2br($questions->text) !!}</div>
        <p>
            <div>
                <span class="badge badge-primary">Дата создания : {{ $questions->created_at }}</span>
            @if ($questions->name)
                <span class="badge badge-success">Автор : {{ $questions->name }}</span>
            @else
                <span class="badge badge-secondary">Анонимный пользователь</span>
            @endif
            </div>
        </p>
        <hr>

        <div class="list-group">
            @if (count($answers) > 0)
            @foreach($answers as $answer)
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">
                        {{ $answer->text  }}
                    </h4>
                    @if(Auth::check())
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form role="form" method="post" action="{{ route('addRate',['question'=>$questions->id,'id'=>$answer->id]) }}">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-success">
                                    +1
                                </button>
                            </form>
                            <button type="button" class="btn btn-secondary">
                                {{ $answer->rate  }}
                            </button>
                            <form role="form" method="post" action="{{ route('minRate',['question'=>$questions->id,'id'=>$answer->id]) }}">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger">
                                    -1
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                    <div class="float-left">
                        <div>
                            <span class="badge badge-secondary">{{ $answer->created_at }}</span>
                            <span class="badge badge-success">{{ $answer->name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <h2>
                    Ответов нет
                </h2>
            @endif
        </div>
            @if(Auth::check())
            <div class="alert alert-secondary" role="alert">
                <form role="form" method="post" action="{{ route('newComment',['id'=>$questions->id]) }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="text">Ответить на вопрос</label>
                        <textarea class="form-control" id="text" name="text" rows="3" required placeholder="Текст"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Отправить</button>
                </form>
            </div>
            @endif
    </main>
@endsection

@section('title', 'Просмотр вопроса')