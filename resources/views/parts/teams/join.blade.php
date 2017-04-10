@can('join', $team)
    <form action="{{ route('teams.join', $team->id) }}" method="post"
          id="joinForm__{{ $role }}">
        {{ csrf_field() }}
        <input type="hidden" name="role" value="{{ $role }}">
    </form>

    <div class="c_search-char__teamfree">
        <div class="c_search-char__teamitem-type c_search-char__doplist-sniper"></div>
        <div class="c_search-char__teamitem-vakant">Вакантно</div>
        <div class="c_search-char__teamitem-callme">
            <a href="#"
               onclick="event.preventDefault(); document.getElementById('joinForm__{{ $role }}').submit();"
               style="color: inherit; text-decoration: none;">
                Откликнуться
            </a>
        </div>
    </div>
@else
    @if(Auth::id() !== null && $user = $team->findUserWhereStatus(Auth::id(), ['pending']))
        @if($user->pivot->role === $role)
            <form action="{{ route('teams.leave', $team->id) }}" method="post"
                  id="leaveForm__{{ $role }}">
                {{ csrf_field() }}
            </form>

            <div class="c_search-char__teamfree">
                <div class="c_search-char__teamitem-vakant">
                    {{ trans('team.show.join.pending') }}
                </div>
                <div class="c_search-char__teamitem-callme">
                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('leaveForm__{{ $role }}').submit();"
                       style="color: inherit; text-decoration: none;">
                        Отметить заявку
                    </a>
                </div>
            </div>
        @endif
    @endif
@endcan