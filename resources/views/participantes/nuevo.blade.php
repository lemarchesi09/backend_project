@extends('base')
@section('title') Participante Nuevo @endsection
@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ "Participante Nuevo" }}</h1>
    </div>


    <form action="" method="post">

        {{ csrf_field() }}
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="edad" class="form-control" id="edad" name="edad">
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">Pais</label>
            <input type="pais" class="form-control" id="pais" name="pais">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
@endsection
