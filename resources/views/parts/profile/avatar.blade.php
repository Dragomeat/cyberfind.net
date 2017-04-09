<div class="c_kabinet-thumb">
    <a href="{{ $route }}">
					<span class="c_kabinet-thumb__img">
						<img src="//www.gravatar.com/avatar/{{$user->email}}?s=165" alt="{{ $user->login }}">
						<span class="c_kabinet-thumb__dot active"></span>
					</span>
        <span class="c_kabinet-thumb__name">{{ $user->login }}</span>
    </a>
</div>