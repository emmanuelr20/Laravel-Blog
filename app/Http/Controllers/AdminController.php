<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class AdminController extends Controller
{
    protected $articles;

    public function __construct(Article $article)
    {
        $this->middleware('auth');
        $this->article = $article; 
    }

    public function index()
    {
        return redirect('/home');
    }
    public function view(Article $article)
    {
        $comments = $article->comments()->get();
        return view('admin.view_article', compact('article', 'comments'));
    }
     public function viewAll($value='')
    {
        $articles = $this->article->all();
    	return view('admin.articles', compact('articles'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
    			'title' => 'required|min:3|max:50',
    			'body' => 'required',
    			]);
        $slug = str_replace(' ', '-', $request->title);
        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $slug
        ]);
        return back();
    }
    public function delete(Article $article)
    {
        $article->delete();
        return back();
    }
    public function update(Article $article, Request $request)
    {
        $this->validate($request, [
    			'title' => 'required|min:3|max:50',
    			'body' => 'required',
    			]);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->slug = str_replace(' ', '-', $request->title);
        $article->save();
        return redirect('/admin/articles');
    }
    public function edit(Article $article)
    {
        return view('admin.edit_article', compact('article'));
    }
}
