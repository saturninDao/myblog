<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Manager\ArticleManager;
use App\Models\Article;
use App\Models\Category;

/**
 *
 */
class ArticleController extends Controller
{
    private $articleManager;
    public function __construct(ArticleManager $articleManager){
        $this->articleManager = $articleManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(5);
        return view('article.index', ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
       // dd($request->request->get('titre'));
        $validated = $request->validated();
        $this->articleManager->build(new Article(), $request);
        /*
        Article::create([
            'title'=>$request->input('title'),
            'subtile'=>$request->input('subtile'),
            'content'=> $request->input('content'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
*/
       return redirect()->route('articles.index')->with('success','L\'article a bien été sauvegardé');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article'=>$article,
                'categories'=>Category::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $this->articleManager->build($article,$request);

        return redirect()->route('articles.index')->with('success','L\'article a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        //dd($article);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'L\'article a bien été supprimé');
    }
}
