<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class RatingController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        // in real life sorting should be done by sql
        $articlesForRating = $articles->filter(function ($a) {
            return $a->isPublished();
        })->sortByDesc('likes_count');
        return view('rating.index', ['articles' => $articlesForRating]);
    }
}
