@extends('layouts.app')

@section('content')
<head>
  <!-- CSS -->
  <link rel="stylesheet" href="{!! asset('css/boton.css') !!}">
</head>

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
                <th scope="col">Video</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($videos as $video)
              <tr>
                <td class="embed-responsive-4by3">
                  <video class="embed-responsive-item" src="{{$video->video}}" controls poster="{{ asset("$video->imagen") }}"></video>
                </td>
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
      <br>
      <div class="float-right">
        {{ $videos->links() }}
      </div>
    </div>
    <button class="botton-float">
      <a class="text-decoration-none" href="{{ route('crear.video') }}">
        <span class="span-float">+</span>
      </a>
    </button>
  </div>

</div>
@endsection
