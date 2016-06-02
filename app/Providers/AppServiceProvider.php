<?php

namespace App\Providers;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

//        Carbon::setLocale('zh');
        Blade::directive('carbon', function($expression) {
            return "<?php echo \\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$expression)->diffForHumans(); ?>";
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
