<?php
declare(strict_types=1);


namespace Application\Modules\Currency\Providers;

use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);
    }


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->resolveProvider(CurrencyRoutesServiceProvider::class)->boot();
    }

}
