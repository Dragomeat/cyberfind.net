<ol class="breadcrumb c_breadcrumbs">
    <li>
        <a href="{{ route('index') }}">{{ trans('header.links.index') }}</a>
    </li>

    @while ($element = current($breadcrumbs))
        <li>
           @if(is_string(key($breadcrumbs)))
               <a href="{{ key($breadcrumbs) }}">{{ $element }}</a>
           @else
              {{ $element }}
           @endif
        </li>

        @php
            next($breadcrumbs)
        @endphp
    @endwhile
</ol>