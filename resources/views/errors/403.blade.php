@extends('layouts.error')

@section('content')
    <h3>Ошибка доступа</h3>
    {{ $exception->getMessage() }}
@endsection