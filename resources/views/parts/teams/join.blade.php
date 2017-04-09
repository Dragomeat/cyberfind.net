@can('join', $team)
    <form action="{{ route('teams.join', $team->id) }}" method="post"
          id="joinForm__main">
        {{ csrf_field() }}
        <input type="hidden" name="role" value="main_part">
    </form>

    <div class="c_search-char__teamfree">
        <div class="c_search-char__teamitem-type c_search-char__doplist-sniper"></div>
        <div class="c_search-char__teamitem-vakant">Вакантно</div>
        <div class="c_search-char__teamitem-callme">
            <a href="#"
               onclick="event.preventDefault(); document.getElementById('joinForm__main').submit();"
               style="color: inherit; text-decoration: none;">
                Откликнуться
            </a>
        </div>
    </div>
@endcan