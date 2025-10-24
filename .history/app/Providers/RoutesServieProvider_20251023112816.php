<?php
// ... namespace and uses

class RouteServiceProvider extends ServiceProvider
{
    // ... other methods like HOME constant

    public function boot(): void

    // ... (This is where the rate limiting is defined)
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });


        // ... other methods
    }
}