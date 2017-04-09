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
                        <form action="{{ route('auth.password.reset.action') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="token" value="{{ $token }}">

                            @if (session('status'))
                                <div class="c_reg-item">
                                    <div class="c_reg-item__box">
                                        <input type="text" style="border-color: green; color: green;"
                                               value="{{ session('status') }}" readonly/>
                                    </div>
                                </div>
                            @endif

                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Email:</div>
                                <div class="c_reg-item__box">
                                    <input type="email" name="email" value="{{ $email or old('email') }}"/>
                                </div>
                            </div>

                            @if($errors->has('email'))
                                <div class="c_reg-item">
                                    <div class="c_reg-item__box">
                                        <input type="text" style="border-color: red; color: red;"
                                               value="{{ $errors->first('email') }}" readonly/>
                                    </div>
                                </div>
                            @endif

                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Password:</div>
                                <div class="c_reg-item__box">
                                    <input type="password" name="password" value="{{ old('password') }}"/>
                                </div>
                            </div>

                            @if($errors->has('password'))
                                <div class="c_reg-item">
                                    <div class="c_reg-item__box">
                                        <input type="text" style="border-color: red; color: red;"
                                               value="{{ $errors->first('password') }}" readonly/>
                                    </div>
                                </div>
                            @endif
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Password confirmation:</div>
                                <div class="c_reg-item__box">
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"/>
                                </div>
                            </div>

                            @if($errors->has('password_confirmation'))
                                <div class="c_reg-item">
                                    <div class="c_reg-item__box">
                                        <input type="text" style="border-color: red; color: red;"
                                               value="{{ $errors->first('password_confirmation') }}" readonly/>
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
