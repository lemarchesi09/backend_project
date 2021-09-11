@extends('base')
@section('title') Participantes @endsection
@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{"Participantes"}}</h1>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="btn btn-primary" aria-current="page" href="">+ Nuevo</a>
              </li> 
            </ul>             
            <form action="{{ route("about.search")}}" method="POST" class="d-flex">
              {{ csrf_field() }}
              <input class="form-control me-2" type="search" placeholder="Buscar" name="search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Edad</th>
            <th scope="col">País</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($participantes as $participante)
            <tr>
   
              <th scope="row">{{$participante->id}}</th>
              <td>{{ $participante->nombre }}</td>
              <td>{{ $participante->apellido }}</td>
              <td>{{ $participante->edad }}</td>
              <td>{{ $participante->pais }}</td>
              <td class="d-flex">
                <a href="{{ route ("about.edit", $participante->id)}}" class = "btn btn-sm btn-primary">Edit</a>
                <form action="{{ route("about.destroy", $participante->id)}}" method = "post">
                  
                  {{ csrf_field() }}
                  {{method_field("DELETE") }}
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar el registro?')">Delete</button>

                </form>
              </td>
              
              

            </tr>
          @endforeach
        </tbody>
      </table>
@endsection