@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-12 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="{{route('guardar.video')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nombreV">Nombre Video</label>
              <input type="text" class="form-control" id="nombreV" name="nombre" placeholder="Nombre video" required>
            </div>
            <div class="form-group">
              <label for="duracion">Duración</label>
              <input type="time" class="form-control" id="duracion"  name="duracion" placeholder="Duración" list="listatiempo" format="HH:MM:SS">
            </div>
            <datalist id="listatiempo">
              <option value="00:03:00">
                <option value="00:10:00">
                </datalist>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción" required></textarea>
                </div>
                <div class="form-group">
                  <label for="categoria">Categoría</label>
                  <select class="form-control" id="categoria" name="categoria">
                    <option value="Laravel">Laravel</option>
                    <option value="Java">Java</option>
                    <option value="React">React</option>
                    <option value="Ionic">Ionic</option>
                    <option value="jQuery">jQuery</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="imagen">Subir imagen de portada para el video</label><br>
                  <input type="file" name="imagen" accept=".jpeg,.jpg,.png">
                </div>
                <div class="form-group">
                  <label for="video">Subir video</label><br>
                  <input type="file" name="video" accept=".mp4">
                </div>
                <div class="form-group">
                  <label for="asigEstado">Asignar estado</label>
                  <select class="form-control" id="asigEstado" name="estado">
                    <option value="Por revisar">Por revisar</option>
                    <option value="Publicar">Publico</option>
                    <option value="Privado">Privado</option>
                  </select>
                </div>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Aceptar</button>
                <a type="button" class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/home') }}">Cancelar</a>
              </form>
              <br>

              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif

            </div>
          </div>
        </div>
      </div>

      @endsection
