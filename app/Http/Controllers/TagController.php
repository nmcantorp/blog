<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\Http\Requests\TagsRequest;

class TagController extends Controller
{
    function index(Request $request)
    {

    	$tags = Tag::search($request->name)->orderBy('id','ASC')->paginate(5);
    	return view('admin.tags.index')->with( 'tags', $tags );
    }
    
    function create()
    {
    	return view('admin.tags.create'); 
    }
    
    function store(TagsRequest $request )
    {
    	$tags = new Tag($request->all());
    	$tags->save();

    	flash()->success('Registro Exitoso');
    	return redirect()->route('admin.tags.index');
    }

     public function destroy($id_tag)
    {    	
    	$tags = Tag::find($id_tag);
    	$tags->delete();
    	flash()->error('Registro borrado correctamente');
    	return redirect()->route('admin.tags.index');
    }


    public function edit($id_tag)
    {
    	$tags = Tag::find($id_tag);
    	return view('admin.tags.edit')->with('category',$tags);
    }

    public function update(TagsRequest $request)
    {
    	$id_tag =	$request->id;
    	unset($request->all()->id);
    	$tags = Tag::find($id_tag);
    	$tags->name = $request->name;
    	
    	$tags->save();
    	flash()->success('Actualización realizada correctamente');

    	return redirect()->route('admin.tags.index');
    }
}
