<?php

use App\Models\Category;
use App\Models\Files;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    //$files = Category::with('getFiles')->get();
    //dd($files);
    $categories = Category::tree()
        ->with('getFiles')->get()
        ->toTree();

    $category = Category::find(1);
    $category_ids = $category->getDescendants($category);

    return view('welcome', [
        'categories' => $categories,
        'category_ids' => $category_ids
        
    ]);
});

Route::post('/create_sub_category', [CategoryController::class, 'create_sub_category'])->name('create_sub_category');
Route::post('/upload_file', [CategoryController::class, 'upload_file'])->name('upload_file');
