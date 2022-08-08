<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [HomeController::class, 'index']);
Route::get('/ ',[PostController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/posts ',[PostController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index']);

// Route::get('/authors', [AuthorsController::class, 'index']);


// single post
// variable slug diambil dengan {slug} bukan  {{ $post["slug"] }}
// ini disebut metode whilecard , untuk ambil apapun isi slash.nya
Route::get('/post/{post:slug}', [PostController::class, 'show']);

// Route::get('/categories', function(){

//     return view('categories', [
//         'title' => "Categories",
//         'categories' => Category::all()->paginate(1)
//     ]);
// });

Route::get('/authors', function(User $user){
    return view('authors', [
        'title' => "Authors",
        'user' => $user,
        'authors' => User::all()
    ]);
});

// post per category
Route::get('/categories/{category:slug}', function(Category $category){
    return view('blog',[
        'title' => "Post by Category : $category->name",
        'posts' => $category->post->load('author', 'category')
    ]);
});

// post per username
Route::get('/authors/{author:username}', function(User $author){
    return view('blog',[
        'title' => "Post by Author : $author->name",
        'posts' => $author->post->load('author', 'category')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// jika ada request get ke halaman /register, maka janlankan method index
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// jika ada request post ke halaman /register, maka janlankan method store
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', function(){
//     return view('dashboard.index');
// })->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

Route::resource('/dashboard', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');

