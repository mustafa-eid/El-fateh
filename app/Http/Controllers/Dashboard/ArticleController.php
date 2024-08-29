<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Traits\media;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::with('articleCategory')->orderBy('article_category_id')->get();
        $adminId = auth()->guard('admin')->id();

        $admin = DB::table('admins')->where('id', $adminId)->first();
        return view('dashboard.articles.index', compact('articles', 'admin'));
    }

    public function create()
    {
        $categories = ArticleCategory::all();
        return view('dashboard.articles.create', compact('categories'));
    }

    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();

        // Handling image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('articles', 'public');
        }

        Article::create($data);
        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }


    public function edit(Article $article)
    {
        $categories = ArticleCategory::all();
        return view('dashboard.articles.edit', compact('article', 'categories'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        // Handling image upload
        if ($request->hasFile('image')) {
            if (isset($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
            // Store new image
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        if ($request->hasFile('pdf')) {
            if (isset($article->pdf)) {
                Storage::disk('public')->delete($article->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('articles', 'public');
        }

        $article->update($data);
        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }




    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        if ($article->pdf) {
            Storage::disk('public')->delete($article->pdf);
        }
        
        $article->delete();

        return redirect()->back()->with('success', 'Article deleted successfully.');
    }

    public function show_comments($article_id)
    {
        $comments = Comment::where('article_id', $article_id)->get();
        return view('dashboard.articles.show_comments', compact('comments'));
    }
    public function pending_comments()
    {
        $comments = Comment::where('status', 'pending')->get();
        return view('dashboard.articles.pending_comments', compact('comments'));
    }
    public function comment_controll(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('success', 'Data saved successfully.');
    }

    public function comment_destroy($id)
    {
        $comment = Comment::destroy($id);
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
