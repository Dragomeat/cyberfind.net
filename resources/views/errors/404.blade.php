@extends('layouts.error')

@section('content')
    <h3>Страница не найдена</h3>
    {{ $exception->getMessage() }}
    <p>
        <a href="{{ route('index') }}">Вернуться на главную</a>
    </p>
@endsection