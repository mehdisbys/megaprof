<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\App;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();

        return view('articles.index')->with(['articles' => $articles]);
    }


    public function view($slug)
    {
         $article = Article::where(['slug' => $slug])->first();

         if ($article == NULL) App::abort(404);

        return view('articles.article')->with(['article' => $article]);
    }


    public function getCreate()
    {
        return view('articles.create');
    }

    public function postCreate(\Illuminate\Http\Request $request)
    {
        $data = $request->only(['title', 'meta', 'tagline', 'content']);

        $article = Article::create($data);

        $article->save();

        thanks('Article sauvegardé');

        return redirect()->back();
    }

    public function getEdit($slug)
    {
        $article = Article::where(['slug' => $slug])->first();

        if ($article == NULL) App::abort(404);

        return view('articles.create')->with(['article' => $article]);
    }

    public function postEdit(\Illuminate\Http\Request $request, $slug)
    {
        $data = $request->only(['title', 'meta', 'tagline', 'content']);

        $article = Article::where(['slug' => $slug])->first();

        if ($article == NULL) App::abort(404);

        $article->update($data);

        thanks('Article edité');

        return redirect()->back();
    }

}