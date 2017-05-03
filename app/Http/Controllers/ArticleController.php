<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\App;

class ArticleController extends Controller
{


    public function view($slug)
    {
        // $article = Article::where(['slug' => $slug])->first();

        // if ($article == NULL) App::abort(404);

//        return view('articles.article')->with(['article' => $article]);
        return view('articles.article');
    }

}