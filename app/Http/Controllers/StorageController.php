<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class StorageController extends Controller
{
  public function home()
  {
      $videos = Video::get()->paginate(15);
      //$videos1 = DB::table('videos')->;
      return view('home')->with('videos', $videos);
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

    $path = $request->imagen->storeAs('public/images', rand(1,100).time().'.'.$request->imagen->extension());
    $video->imagen = $path;

    $path = $request->video->storeAs('public/images', rand(1,100).time().'.'.$request->video->extension());
    $video->video = $path;

    $video->estado = $request->estado;

    if ($video->save()) {
      return redirect()->route('home');
    }
    return redirect()->route('home')->withErrors('No es posible guardar el video');
  }
}
