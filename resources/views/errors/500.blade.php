@extends('layouts.error')

@section('content')
    <h3>Ошибка сервера</h3>
    {{ $exception->getMessage() }}

    @unless(empty($sentryID))
        <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

        <script>
            Raven.showReportDialog({
                eventId: '{{ $sentryID }}',
                dsn: 'https://4f1219eaf54b4fb2b7757861c3d695d3@sentry.io/156991'
            });
        </script>
    @endunless
@endsection
