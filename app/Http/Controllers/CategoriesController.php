<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{
    function index()
    {
    	$category = Category::orderBy('id','ASC')->paginate(5);

    	return view('admin.categories.index')->with( 'categories', $category );
    }

    function create()
    {
    	return view('admin.categories.create'); 
    }

    function store(CategoriesRequest $request )
    {
    	$Categories = new Category($request->all());
    	$Categories->save();

    	flash()->success('Registro Exitoso');
    	return redirect('admin/categories');
    }

     public function destroy($id_category)
    {    	
    	$category = Category::find($id_category);
    	$category->delete();
    	flash()->error('Registro borrado correctamente');
    	return redirect('admin/categories');
    }


    public function edit($id_category)
    {
    	$category = Category::find($id_category);
    	return view('admin.categories.edit')->with('category',$category);
    }

    public function update(CategoriesRequest $request)
    {
    	$id_category =	$request->id;
    	unset($request->all()->id);
    	$category = Category::find($id_category);
    	$category->name = $request->name;
    	
    	$category->save();
    	flash()->success('Actualización realizada correctamente');

    	return redirect('admin/categories');
    }
}
