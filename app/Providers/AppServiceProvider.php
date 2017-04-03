<?php

namespace App\Providers;

use ReCaptcha\ReCaptcha;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param ReCaptcha $captcha
     * @return void
     */
    public function boot(ReCaptcha $captcha)
    {
        Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) use ($captcha) {
            $request = $captcha->verify($value, request()->ip());

            return $request->isSuccess();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ReCaptcha::class, function () {
            return new ReCaptcha(
                config('services.recaptcha.secret_key')
            );
        });
    }
}
