@extends('layouts.app')

@section('content')
    <div class="b_inb">
        <div class="c_breadcrumbs">
            <a href="#">Главная</a> /
            <span class="current">Регистрация</span>
        </div>
        <div class="c_box">
            <div class="c_box-contact">
                <h1>Регистрация</h1>
                <div class="c_box-ins">
                    <div class="c_reg-form">
                        <form action="" method="POST">
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Имя:</div>
                                <div class="c_reg-item__box"><input type="text" name="first-name"></div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Фамилия:</div>
                                <div class="c_reg-item__box"><input type="text" name="last-name"></div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Логин (мин. 3 символа):*</div>
                                <div class="c_reg-item__box"><input type="text" name="nickname"></div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Пароль (мин. 6 символов):*</div>
                                <div class="c_reg-item__box"><input type="pass" name="password"></div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Подтверждение пароля:*</div>
                                <div class="c_reg-item__box"><input type="pass" name="req-password"></div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">E-mail:*</div>
                                <div class="c_reg-item__box"><input type="email" name="email"></div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__box">
                                    <img src="i/contact-control-thumbs.jpg" alt="control">
                                    <div class="c_reg-item__refresh">Обновить</div>
                                </div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Введите слово на картинке:*</div>
                                <div class="c_reg-item__box"><input type="text" name="form-number"></div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__box">
                                    <input type="submit" value="Регистрация">
                                    <a href="#" class="c_reg-login action" data-event="login">Вход</a>
                                </div>
                            </div>
                            <div class="c_reg-item">На указанный в форме e-mail придет запрос на подтверждение регистрации.</div>
                            <div class="c_reg-item">* Обязательно к заполнению</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
