<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Danhmuc;
use App\Models\Sanpham;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('customer.components.menu_categories',function ($view){
            $typePro = Danhmuc::orderBy('id', 'desc')->take(6)->get();
            $pro = Sanpham::all();
            $view->with('categories', $typePro);
        });
        view()->composer('customer.components.menu_categories',function ($view){
            // $typePro = Danhmuc::orderBy('id', 'desc')->take(6)->get();
            // $pro = DB::table('san_pham')->distinct()->get();
            $pro = Sanpham::select('xuat_xu')->distinct()->get();
            $view->with('product', $pro);
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
