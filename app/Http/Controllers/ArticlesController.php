<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Tag;
use App\Image;

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

    function store(Request $request)
    {
        //manipulación de imagenes 
        if($request->file('imagen'))
        {
            $file = $request->file('imagen');
            $name = 'blogPersonal_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path() ."/images/articles/";
            $file->move( $path,$name );
        }

        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        $article->save();
        if($request->file('imagen'))
        {
            $imagen = new Image();
            $imagen->article()->associate($article);
            $imagen->name = $name;
            $imagen->save();
        }

        return redirect()->route('admin.articles.index');
    }
}
