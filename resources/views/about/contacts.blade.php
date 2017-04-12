@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements'  => [
                'Контакты'
            ],
        ])
        @endcomponent
        <div class="c_box">
            <h1>Контакты</h1>
            <div class="c_contact-top">
                <div class="c_contact-map">
                    <script type="text/javascript" charset="utf-8" async
                            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=cLfp0ErHPrV_lQ-Qjb6x6VEw3qdy2UYv&amp;width=100%25&amp;height=340&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>
                </div>
                <div class="c_contact-form">
                    <form action="{{ route('about.feedback') }}" method="post">
                        <div class="c_contact-item">
                            <div class="c_contact-item__box c_contact-form__head">Контактная форма</div>
                        </div>
                        <div class="c_contact-item">
                            <div class="c_contact-item__name">Имя:*</div>
                            <div class="c_contact-item__box">
                                <input type="text" name="name" required>
                            </div>
                        </div>

                        @if($errors->has('name'))
                            <div class="c_contact-item">
                                <div class="c_contact-item__box">
                                    <input type="text" style="border-color: red; color: red;"
                                           value="{{ $errors->first('name') }}" readonly/>
                                </div>
                            </div>
                        @endif

                        <div class="c_contact-item">
                            <div class="c_contact-item__name">Тема:*</div>
                            <div class="c_contact-item__box">
                                <input type="text" name="subject" required>
                            </div>
                        </div>

                        @if($errors->has('subject'))
                            <div class="c_contact-item">
                                <div class="c_contact-item__box">
                                    <input type="text" style="border-color: red; color: red;"
                                           value="{{ $errors->first('subject') }}" readonly/>
                                </div>
                            </div>
                        @endif

                        <div class="c_contact-item">
                            <div class="c_contact-item__name">E-mail:*</div>
                            <div class="c_contact-item__box">
                                @if(Auth::check())
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" readonly>
                                @else
                                    <input type="email" name="email">
                                @endif
                            </div>
                        </div>

                        @if($errors->has('email'))
                            <div class="c_contact-item">
                                <div class="c_contact-item__box">
                                    <input type="text" style="border-color: red; color: red;"
                                           value="{{ $errors->first('email') }}" readonly/>
                                </div>
                            </div>
                        @endif

                        <div class="c_contact-item">
                            <div class="c_contact-item__name">Сообщение:*</div>
                            <div class="c_contact-item__box">
                                <textarea name="message"></textarea>
                            </div>
                        </div>

                        @if($errors->has('message'))
                            <div class="c_contact-item">
                                <div class="c_contact-item__box">
                                    <input type="text" style="border-color: red; color: red;"
                                           value="{{ $errors->first('message') }}" readonly/>
                                </div>
                            </div>
                        @endif

                        <div class="c_contact-item">
                            <div class="c_contact-item__box">
                                <div class="g-recaptcha" data-theme="dark"
                                     data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            </div>

                            {!! csrf_field() !!}
                        </div>

                        @if($errors->has('g-recaptcha-response'))
                            <div class="c_contact-item">
                                <div class="c_contact-item__box">
                                    <input type="text" style="border-color: red; color: red;"
                                           value="{{ $errors->first('g-recaptcha-response') }}" readonly/>
                                </div>
                            </div>
                        @endif

                        <div class="c_contact-item">
                            <div class="c_contact-item__box"><input type="submit" value="Отправить"></div>
                        </div>
                        <div class="c_contact-item">
                            <div class="c_contact-item__box c_contact-item__bot">* Обязательно к заполнению</div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="c_contact-list">
                <div class="c_contact-list__item">
                    <div class="c_contact-list__name">Администратор:</div>
                    <a href="mailto:admin@cyberfind.net">admin@cyberfind.net</a>
                </div>
                <div class="c_contact-list__item">
                    <div class="c_contact-list__name">Техпомощь:</div>
                    <a href="mailto:suport@cyberfind.net">suport@cyberfind.net</a>
                </div>
                <div class="c_contact-list__item">
                    <div class="c_contact-list__name">Служба поддержки:</div>
                    <a href="mailto:info@cyberfind.net">info@cyberfind.net</a>
                </div>
            </div>
        </div>
    </div>
@endsection