<?php

namespace App\Providers;

use App\Models\Favorite;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Schema::defaultStringLength(191);
    Paginator::useBootstrap();

    view()->composer('*', function ($view) {
      $favorites = [];

      if (session('user')) {
        $favorites = Favorite::where('user_id', session('user')->id)->get();
      }

      return $view->with([
        'favorites' => $favorites,
      ]);
    });
  }
}
