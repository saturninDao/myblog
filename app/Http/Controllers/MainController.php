<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home(){
        //$articles =  DB::table('articles')->paginate(5);
        $articles = Article::paginate(5);
        return view('home',['articles'=> $articles]);
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('article', ['article'=>$article]);
    }
}
