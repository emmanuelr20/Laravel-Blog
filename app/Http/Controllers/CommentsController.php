<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
	private $comment;
	private $article;
	public function __construct(Comment $commentModel, Article $articleModel)
	{
		#parent::__construct();
		$this->comment = $commentModel;
		$this->article = $articleModel;
	}
    public function store(Request $request, Article $article)
    {
    	if ($request->isMethod('post')) {
    		$this->validate($request, [
    			'name' => 'required|min:3|max:50|alpha',
    			'comment' => 'required',
    			]);

    		try {

                // $article = $this->article->where('id', $id)->first();

                // #dd($article);
    			// #$article = $this->article->findOrFail($article_id);
    			$new_comment = new Comment([
		    		'name' => $request->name,
		    		'comment' => $request->comment,
					'article_id' => $article->id,
		    		]);
					$new_comment->save();
                // dd($new_comment);
    			
                \Session::flash('message', 'Comment Created!');
				return back();
    		} catch (ModelNotFoundException $e) {
    			abort("Article does not exist");
    		}	
    	}
    }
}
