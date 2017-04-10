<?php

namespace App\Providers;

use App\Models\Team\Map;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Sentry\SentryLaravel\SentryLaravelServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Barryvdh\Debugbar\ServiceProvider as DebugbarProvider;

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

        Validator::extend('maps', function ($attribute, $maps, $parameters, $validator) {
            foreach ($maps as $map) {
                if (!Map::exists($map)) {
                    return false;
                }
            }

            return true;
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

        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
            $this->app->register(DebugbarProvider::class);
        } else {
            $this->app->register(SentryLaravelServiceProvider::class);
        }
    }
}
