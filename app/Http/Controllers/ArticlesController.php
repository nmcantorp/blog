<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Category;
use App\Tag;
use App\Image;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::search($request->name)->orderBy('id','ASC')->paginate(5);
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });

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

    function store(ArticleRequest $request)
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

        $article->tag()->sync( $request->tags );
        if($request->file('imagen'))
        {
            $imagen = new Image();
            $imagen->article()->associate($article);
            $imagen->name = $name;
            $imagen->save();
        }

        return redirect()->route('admin.articles.index');
    }

    public function destroy($id_article)
    {       
        $category = Article::find($id_article);
        $category->delete();
        flash()->error('Registro borrado correctamente');
        return redirect()->route('admin.articles.index');
    }

    public function edit($id_tag)
    {
        $articles = Article::find($id_tag);
        $articles->category;
        $myTags = $articles->tag->lists('id')->toArray();
        $categories = Category::orderBy('name','ASC')->lists('name', 'id');
        $tags = Tag::orderBy('name','ASC')->lists('name', 'id');
        return view('admin.articles.edit')->with('articles',$articles)
                                      ->with('categories', $categories)
                                      ->with('tags',$tags)
                                      ->with('myTags', $myTags);
    }

    public function update(Request $request)
    {
        $id_article =   $request->id;
        unset($request->id);
        $article = Article::find($id_article);
        $article->title = $request->title; 
        $article->content = $request->content; 
        $article->category_id = $request->category_id; 
        $article->save();

        $article->tag()->sync( $request->tags );       
        
        flash()->success('Actualización realizada correctamente en el articulo '.$request->title);

        return redirect()->route('admin.articles.index');
    }
}
