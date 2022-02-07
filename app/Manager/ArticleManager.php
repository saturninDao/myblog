<?php

namespace  App\Manager;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Carbon;

class ArticleManager{
    public function build(Article $article, ArticleRequest $request){

        $article->title = $request->input('title');
        $article->subtile = $request->input('subtile');
        $article->content = $request->input('content');
        $article->save();
    }
}
