<div class="c_breadcrumbs">
    <a href="#">Главная</a>

    @while ($element = current($elements))
        @if(is_string(key($elements)))
            <a href="{{ key($elements) }}">{{ $element }}</a>
        @else
            <span>{{ current($elements) }}</span>
        @endif

        @php
            next($elements)
        @endphp
    @endwhile
</div>