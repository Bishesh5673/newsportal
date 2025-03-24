<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|max:255",
            "content"=>"required",
            "image"=>"required|mimes:jpg,png,gif,avif,svg,webp"
        ]);

        $article= new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;
        $file = $request->image;
        if($file){
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$filename);
            $article->image = "images/$filename";
        }
        $article->save();
        $article->categories()->attach($request->categories);
        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articles = Article::find($id);
        $categories = Category::all();
        return view('admin.article.edit',compact('articles','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title"=>"required|max:255",
            "content"=>"required",
            "image"=>"nullable|mimes:jpg,png,gif,avif,svg,webp"
        ]);

        $article= Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;
        $file = $request->image;
        if($file){
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$filename);
            $article->image = "images/$filename";
        }
        $article->save();
        $article->categories()->sync($request->categories);
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}
