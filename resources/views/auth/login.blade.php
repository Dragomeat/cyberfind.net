@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements' => [
               trans('auth.breadcrumbs.login')
            ]
        ])
        @endcomponent

        <div class="c_box">
            <div class="c_box-contact">
                <h1>{{  trans('auth.breadcrumbs.login') }}</h1>
                <div class="c_box-ins">
                    <div class="c_reg-form">
                        <form action="{{ route('auth.login.post') }}" method="POST">
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">{{  trans('auth.fields.email') }}</div>
                                <div class="c_reg-item__box">
                                    <input type="email" name="email" value="{{ old('email') }}"/>
                                </div>
                            </div>

                            @if($errors->has('email'))
                                <div class="c_reg-item" style="border-color: red;">
                                    <div class="c_reg-item__box">
                                        <input type="text" style="border-color: red; color: red;" value="{{ $errors->first('email') }}" readonly/>
                                    </div>
                                </div>
                            @endif

                            <div class="c_reg-item">
                                <div class="c_reg-item__name">{{  trans('auth.fields.password') }}</div>
                                <div class="c_reg-item__box">
                                    <input type="password" name="password" value="{{ old('password') }}"/>
                                </div>
                            </div>

                            @if($errors->has('password'))
                                <div class="c_reg-item" style="border-color: red;">
                                    <div class="c_reg-item__box">
                                        <input type="text" style="border-color: red; color: red;" value="{{ $errors->first('password') }}" readonly/>
                                    </div>
                                </div>
                            @endif

                            <div class="c_reg-item">
                                <div class="c_reg-item__box">
                                    <a href="{{ route('auth.password.request') }}" class="c_reg-login"
                                       data-event="restore">{{  trans('auth.login.restore') }}</a>
                                </div>
                            </div>

                            <div class="c_reg-item">
                                <div class="c_reg-item__box">
                                    <div class="g-recaptcha" data-theme="dark"
                                         data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                                </div>

                                {!! csrf_field() !!}
                            </div>

                            @if($errors->has('g-recaptcha-response'))
                                <div class="c_reg-item">
                                    <div class="c_reg-item__box">
                                        <input type="text" style="border-color: red; color: red;" value="{{ $errors->first('g-recaptcha-response') }}" readonly/>
                                    </div>
                                </div>
                            @endif

                            <div class="c_reg-item">
                                <div class="c_reg-item__box">
                                    <input type="submit" value="{{ trans('auth.login.submit') }}">
                                    <a href="{{ route('auth.register') }}" class="c_reg-login"
                                       data-event="restore">{{  trans('auth.login.registration') }}</a>
                                    <div class="c_reg-socials" style="overflow: hidden; margin-top: 5px;">
                                        <ul class="f_soc">
                                            <li class="vk"><a href="{{ route('auth.social', 'vkontakte') }}"></a></li>
                                            <li class="fb"><a href="{{ route('auth.social', 'facebook') }}"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection