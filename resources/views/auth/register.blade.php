@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements' => [
                  trans('auth.breadcrumbs.registration')
            ]
        ])
        @endcomponent

        <div class="c_box">
            <div class="c_box-contact">
                <h1>{{  trans('auth.breadcrumbs.registration') }}</h1>
                <div class="c_box-ins">
                    <div class="c_reg-form">
                        <form action="{{ route('auth.register.post') }}" method="POST">
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">{{ trans('auth.fields.login') }}</div>
                                <div class="c_reg-item__box">
                                    <input type="text" name="login" value="{{ old('login') }}"/>
                                </div>
                            </div>

                            @if($errors->has('login'))
                                <div class="c_reg-item" style="border-color: red;">
                                    <div class="c_reg-item__box">
                                        <input type="text" style="border-color: red; color: red;" value="{{ $errors->first('login') }}" readonly/>
                                    </div>
                                </div>
                            @endif

                            <div class="c_reg-item">
                                <div class="c_reg-item__name">{{ trans('auth.fields.email') }}</div>
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
                                <div class="c_reg-item__name">{{ trans('auth.fields.password') }}</div>
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
                                <div class="c_reg-item__name">{{ trans('auth.fields.password_confirmation') }}</div>
                                <div class="c_reg-item__box">
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"/>
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
                                    <input type="submit" value="{{ trans('auth.registration.submit') }}">
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