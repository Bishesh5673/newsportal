<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class PageController extends BaseController
{
    public function home(){
        $latest_article = Article::latest()->first();
        $trending_articles = Article::orderBy('views', 'desc')->limit(10)->get();
        return view('frontend.home', compact('latest_article', 'trending_articles'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $articles = $category->articles()->paginate(10);
        return view('frontend.category', compact('articles','category'));
    }

    public function article($id)
    {
        $article = Article::find($id);
        $cookie_data = Cookie::get("page$id");
        if (!$cookie_data) {
            Cookie::queue("page$id", $id);
            $article->increment('views');
        }
        return view('frontend.article', compact('article'));
    }
}
