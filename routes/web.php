<?php
    
    use App\Http\Controllers\AuthSessionController;
    use App\Http\Controllers\PostCommentController;
    use App\Http\Controllers\PostController;
    use App\Http\Controllers\RegisterUserController;
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
    
    /* This single route declaration creates multiple routes
    * to handle a variety of actions on the resource.
     * The generated controller will already have methods
     * stubbed for each of these actions. Remember, you can always
     * get a quick overview of your application's routes by
     * running the route:list Artisan command.
     */
    Route::resource('posts', PostController::class);
    
    Route::post('/posts/{post:id}/comments', [PostCommentController::class, 'store'])->name('posts.comments.store');
    
    Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
    
    Route::get('/login', [AuthSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthSessionController::class, 'store'])->name('login.store');
    Route::post('/logout', [AuthSessionController::class, 'destroy'])->name('logout');