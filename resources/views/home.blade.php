@extends('layouts.app')

@section('content')
<head>
  <!-- CSS -->
  <link rel="stylesheet" href="{!! asset('css/boton.css') !!}">
</head>

<!-- Js para mensaje en contenido fijo -->
<script type="text/javascript">
$(function() {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <p class="text-center font-weight-bold text-uppercase text-monospace">¡Bienvenido!</p>
          <p class="text-center">A continuación podrá visualizar los videos publicados</p>
        </div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <table id="videos" class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($videos as $video)
              <tr>
                <td>{{ $video->nombre }}</td>
                <td>{{ $video->categoria }}</td>
                <td>{{ $video->estado }}</td>
                <!--<td>{{ Storage::url($video->imagen) }}</td>-->
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <button data-toggle="tooltip" title="Presione para agregar un video" data-placement="left" class="botton-float">
    <a class="a text-decoration-none" href="{{route('crear.video')}}">
      <span class="span-float">+</span>
    </a>
  </button>
</div>
@endsection
