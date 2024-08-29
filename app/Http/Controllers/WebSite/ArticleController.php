<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        $articleCategories= ArticleCategory::with('articles')->get();
        return view('website.articles.index', compact('articleCategories'));
    }
    public function showArticles($articleCategoryId)
    {
        $articles = Article::with('articleCategory')->where('article_category_id',$articleCategoryId)->get();
        // $articleCategories= ArticleCategory::with('articles')->get();
        return view('website.articles.show-articles', compact('articles'));
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        $comments = Comment::where('article_id', $article->id)->where('status','approved')->get();
        return view('website.articles.show', compact('article', 'comments'));
    }

    public function store(CommentRequest $request)
    {
        // $user_id=auth()->guard('web')->user()->id;
        $comment=Comment::create([
            'content' => $request->content,
            'article_id' => $request->article_id,
            'user_name' => $request->user_name,
        ]);
        return redirect()->back()->with('success', ' Comment sent successfully.');
    }
}
