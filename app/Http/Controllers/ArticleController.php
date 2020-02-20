<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $articles = $q ? Article::where('name', 'like', "%{$q}%")->paginate() : Article::paginate();

        // $articles = Article::where('name', 'like', "%{$q}%")->get(); вариант поиска без пагинации
        // $articles = Article::paginate();

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles', 'q'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }
}
