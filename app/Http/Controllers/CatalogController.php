<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\peliculas;

class CatalogController extends Controller{


	public function getIndex(){

		$peliculas = peliculas::all();

		foreach( $peliculas as $pelicula ) {
		    echo $pelicula->name;
		}
    return view('catalog.index', array('arrayPeliculas' => $peliculas));
	}

	public function getShow($id){
		$pelicula = peliculas::find(1);
		echo $pelicula->name;

		$model = peliculas::findOrFail($id);

    return view('catalog.show', array('id'=>$id), array('pelicula' => $model));
	}

	public function getCreate(){
    return view('catalog.create');
	}

	public function getEdit($id){
		$pelicula = peliculas::find(1);
		echo $pelicula->name;

		$model = peliculas::findOrFail($id);

    return view('catalog.edit', array('id'=>$id), array('pelicula' => $model));
	}

	public function postCreate(Request $request){

		$p = new peliculas;
	    $p->title = $request->input('title');
	    $p->year = $request->input('year');
	    $p->director = $request->input('director');
	    $p->poster =$request->input('poster');
	    $p->synopsis = $request->input('synopsis');
	    $p->save();

	    return redirect('/catalog');
	}


	public function putEdit(Request $request, $id){

		$p = peliculas::findOrFail($id);
	    $p->title = $request->input('title');
	    $p->year = $request->input('year');
	    $p->director = $request->input('director');
	    $p->poster = $request->input('poster');
	    $p->synopsis = $request->input('synopsis');
	    $p->save();

		return view('catalog.show', ['pelicula' => $p], array('id'=>$id));
	}
}