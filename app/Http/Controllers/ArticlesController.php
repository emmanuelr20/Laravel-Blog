<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
	private $article;
	function __construct(Article $article) {
		$this->article = $article;
	}

    public function index(){
    	//$articles = Article::all(); #straigthforward
    	$articles = $this->article->all();
    	//dd($articles);
    	return view('articles.index', compact('articles'));
    }
    public function view($slug)
    {
        $article = $this->article->where('slug', $slug)->first();
        if (!$article) {
            abort("Article Not Found", 404);
        }
        return view('articles.view_article', compact('article'));
    }
}
