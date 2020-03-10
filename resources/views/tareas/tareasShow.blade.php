@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de tareas</div>

                <div class="card-body">
                    <div class="btn-group" role="group">
                        <a href="{{ route('tarea.edit', $tarea->id) }}" class="btn btn-warning"> Editar tarea</a>                        <form action="{{route('tarea.destroy', $tarea->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> Borrar </button>

                        </form>
                    </div>

                    <hr>
                    Tarea del usuario {{$tarea->user->name}}
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nomrbe</th>
                            <th>Descripcion</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Prioridad</th>
                            <th>Categoria</th>
                        </tr>
                    <td> {{$tarea->id}}</td>
                    <td> {{$tarea->nombreTarea}}</td>
                    <td> {{$tarea->descripcion}}</td>
                    <td> {{$tarea->fechaInicio->format('d/m/y')}}</td>
                    <td> {{$tarea->fechaTermino->format('d/m/y')}}</td>
                    <td> {{$tarea->prioridad}}</td>
                    <td> {{$tarea->categoria->name}}</td>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
