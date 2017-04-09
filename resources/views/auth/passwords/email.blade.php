@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements' => $breadcrumbs
        ])
        @endcomponent

        <div class="c_box">
            <div class="c_box-contact">
                <h1>Восстановление пароля</h1>
                <div class="c_box-ins">
                    <div class="c_reg-form">
                        <form action="{{ route('auth.password.email') }}" method="POST">
                            @if (session('status'))
                                <div class="c_reg-item">
                                    <div class="c_reg-item__box">
                                        <input type="text"  style="border-color: green; color: green;" value="{{ session('status') }}" readonly/>
                                    </div>
                                </div>
                            @endif

                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Email:</div>
                                <div class="c_reg-item__box">
                                    <input type="email" name="email" value="{{ old('email') }}"/>
                                </div>
                            </div>

                            @if($errors->has('email'))
                                <div class="c_reg-item">
                                    <div class="c_reg-item__box">
                                        <input type="text" style="border-color: red; color: red;" value="{{ $errors->first('email') }}" readonly/>
                                    </div>
                                </div>
                            @endif

                            <div class="c_reg-item">
                                <div class="c_reg-item__box">
                                    <div class="g-recaptcha" data-theme="dark" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
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
                                    <input type="submit" value="Восстановить пароль">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

