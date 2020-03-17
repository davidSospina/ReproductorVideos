<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Video;

class StorageController extends Controller
{
  public function home()
  {
      //$videos = Video::get();
      //return view('home')->with('videos', $videos);

      $videos = DB::table('videos')->paginate(3);
      return view('home', ['videos' => $videos]);

  }

  public function crear() {
    return view('videos');
  }

  public function store(Request $request) {
    $validatedData = $request->validate([
        'nombre' => 'required|max:255|min:5',
        'duracion' => '',
        'descripcion' => 'required|max:255|min:2',
        'categoria' => '',
        'imagen' => 'required|mimes:jpeg,jpg,png',
        'video' => 'required|mimes:mp4',
        'estado' => '',
    ]);

    $video = new Video;

    $video->nombre = $request->nombre;
    $video->duracion = $request->duracion;
    $video->descripcion = $request->descripcion;
    $video->categoria = $request->categoria;

    /*if($archivoImagen = $request->file('imagen'){
      $nombre=$archivoImagen->getClientOriginalName()
      $archivoImagen->move('images', $nombre);
      $video->imagen = $archivoImagen;
    })*/

    //$pathImagen = $request->imagen->storeAs('images', rand(1,100).time().'.'.$request->imagen->extension());
    //$pathImagen = $request->imagen->storeAs('images', $request->imagen->getClientOriginalName());

    //Quedo guardada en el public
    $pathImagen = $request->file('imagen')->move('images', time().$request->imagen->getClientOriginalName());
    $video->imagen = $pathImagen;

    $pathVideo = $request->file('video')->move('videos', time().$request->video->getClientOriginalName());
    $video->video = $pathVideo;

    $video->estado = $request->estado;

    if ($video->save()) {
      return redirect()->route('home');
    }
    return redirect()->route('home')->withErrors('No es posible guardar el video');
  }
}
