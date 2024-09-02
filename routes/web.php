<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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
    return view('home', [
        "title" => "Home",
        "active" => "home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Faouzia Ouihya",
        "image" => "faouzia.jpeg",
        "bio" => "Faouzia Ouihya juga dikenal sebagai Faouzia (bahasa Arab: فوزية أويحيى; lahir 5 Juli 2000) adalah seorang penyanyi-penulis lagu dan musisi Maroko-Kanada. Lahir di Casablanca, Maroko, ia pindah bersama keluarganya ke Kanada. Dia merilis beberapa single dan berkolaborasi dengan banyak musisi pada vokal dan penulis lagu sebelum merilis debut extended play (EP), Stripped, pada Agustus 2020.",
    ]);
});


Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    $categories = Category::all();
    return view('categories', [
        "title" => "Categories",
        "active" => "categories",
        "categories" => $categories,
    ]);
});

Route::get('/authors', function() {
    $authors = User::all();
    return view('authors', [
        "title" => "Authors",
        "active" => "authors",
        "authors" => $authors, // Use "authors" to pass the list of users to the view
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkCategorySlug', [AdminCategoryController::class, 'checkCategorySlug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');


// Route::get('/categories/{category:slug}', function(Category $category) {
//     return view('blog', [
//         "title" => 'Post By Category ' . $category->name,
//         "active" => "categories",
//         "posts" => $category->posts->load('category', 'author'),
//     ]);
// });

// Route::get('/author/{author:username}', function(User $author) {
//     return view('blog', [
//         "title" => 'Post By Author ' . $author->name,
//         "active" => "authors",
//         "posts" => $author->posts->load(['category', 'author']),
//     ]);
// });