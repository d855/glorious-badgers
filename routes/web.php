<?php
    
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\View;
    
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */
    
    Route::get('/', function () {
        return view('welcome');
    });
    
    /* The most basic route Laravel route accept a URI and a closure,
    * providing a very simple method of defining routes and
     * behaviour without complicated routing config
      */
    Route::get('/home', function () {
        /* Since this view is stored at /resources/views/home.blade.php
        * we may return it using the global view helper like so
        */
        return view('home');
    })->name('home');
    
    /* Named routes allow the convenient generation of URLs or
    * redirects for specific routes. You may specify a name
    * for a route by chaining the name method onto the route definition:
     */
    Route::get('/contact', function () {
        /* Views may also be returned using the View facade */
        return View::make('contact');
    })->name('contact');
    
    Route::get('/about', function () {
        return view('about');
    })->name('about');