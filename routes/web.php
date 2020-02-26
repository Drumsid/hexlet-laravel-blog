<?php

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

$team = [
    ['name' => 'Hodor', 'position' => 'programmer'],
    ['name' => 'Joker', 'position' => 'CEO'],
    ['name' => 'Elvis', 'position' => 'CTO'],
];

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/about', function () use ($team) {
//     return view('about', ['team' => $team]);
// });

// альтернативный маршрут для about/
Route::get('/about', 'PageController@about')
    ->name('page.about');

Route::get('/team', 'PageController@team')
    ->name('page.team');

Route::get('/testFromBd', function () use ($team) {
    $articles = App\Article::all();
    return view('testBD', ['articles' => $articles]);
})->name('testBd');

Route::get('/rating ', 'RatingController@index')
    ->name('rating.index');

// Название сущности в URL во множественном числе, контроллер в единственном
Route::get('/articles', 'ArticleController@index')
    ->name('articles.index'); // имя маршрута, нужно для того, чтобы не создавать ссылки руками

Route::get('/articles/create', 'ArticleController@create')
    ->name('articles.create');

Route::post('/articles', 'ArticleController@store')
    ->name('articles.store');

Route::get('/articles/{id}', 'ArticleController@show')
    ->name('articles.show');

Route::get('/articles/{id}/edit', 'ArticleController@edit')
    ->name('articles.edit');

Route::patch('/articles/{id}', 'ArticleController@update')
    ->name('articles.update');

Route::delete('/articles/{id}', 'ArticleController@destroy')
    ->name('articles.destroy');
