<?php
declare(strict_types=1);


namespace Application\Modules\Currency\Providers;

use Illuminate\Support\ServiceProvider;

class MerchantsServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->resolveProvider(MerchantsRoutesServiceProvider::class)->boot();
    }

}
