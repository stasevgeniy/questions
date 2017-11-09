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

            <form role="form" method="post" action="{{ route('enter') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name='email'>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
                </div>
                <button type="submit" class="btn btn-success">Войти</button>
            </form>

    </main>
@endsection

@section('title', 'Вопросы - Вход')