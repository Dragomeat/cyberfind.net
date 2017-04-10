<div class="content">
    <div class="title">Something went wrong.</div>
@unless(empty($sentryID))
    <!-- Sentry JS SDK 2.1.+ required -->
        <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

        <script>
            Raven.showReportDialog({
                eventId: '{{ $sentryID }}',
                dsn: 'https://4f1219eaf54b4fb2b7757861c3d695d3@sentry.io/156991'
            });
        </script>
    @endunless
</div>
