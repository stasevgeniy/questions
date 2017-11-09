@extends('layouts.main')

@section('content')
    <main role="main">

        @if ($errors->has())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-danger" role="alert">
                        <button class="close" aria-label="Close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{{ $error }}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form role="form" method="post" action="{{ route('sendQuestion') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" placeholder="Заголовок" name='title'>
            </div>
            <div class="form-group">
                <label for="text">Вопрос</label>
                <textarea class="form-control" id="text" name="text" rows="5" required placeholder="Текст вопроса"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>

    </main>
@endsection

@section('title', 'Вопросы - Новый вопрос')