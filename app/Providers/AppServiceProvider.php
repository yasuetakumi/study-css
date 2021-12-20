<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * @return void
     */
    public function register(){
        require_once app_path() . '/Helpers/DatatablesHelper.php';
        require_once app_path() . '/Helpers/ImageHelper.php';
        require_once app_path() . '/Helpers/FileHelper.php';
        require_once app_path() . '/Helpers/Select2AjaxHelper.php';
        require_once app_path() . '/Helpers/AssetHelper.php';
    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot(){
        Schema::defaultStringLength(191);

        // ------------------------------------------------------------------
        // IF starts with 'https', set forceScheme https.
        if( strpos( config( 'app.url' ), 'https' ) === 0 ) \URL::forceScheme('https'); // Enable HTTPS
        // ------------------------------------------------------------------

        // Blade::component('backend._components.breadcrumbs', 'breadcrumbs');
		// Common process for all view
        View::composer('*', function($view) {
            // If common process is necessary, you can implement here.

		});
    }


}
