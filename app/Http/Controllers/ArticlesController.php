<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Tag;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::search($request->name)->orderBy('id','ASC')->paginate(5);
    	return view('admin.articles.index')->with( 'articles', $articles );
    }
    
    function create()
    {
        $categories = Category::orderBy('name','ASC')->lists('name', 'id');
        $tags = Tag::orderBy('name','ASC')->lists('name', 'id');
    	return view('admin.articles.create')
                ->with('categories',$categories)
                ->with('tag',$tags); 
    }
}
