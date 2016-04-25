<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;

class TestController extends Controller
{
    public function index($id)
    {
    	$article = Article::find($id);

		$article->category;
		$article->user;
		$article->tag;

		return view('article/index', ['prueba' => $article]);
    	dd($article);
    }
}
