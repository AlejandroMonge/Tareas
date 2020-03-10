@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                <a href="{{ action("TareaController@create") }}" class="btn btn-success"> Nueva tarea</a>
                    <hr>
                    Lista de tareas
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nomrbe</th>
                            <th>Descripcion</th>
                        </tr>
                        @foreach ($tareas as $tarea)
                            <tr>
                                <td> {{$tarea->id}}</td>
                                <td><a href="{{route('tarea.show', $tarea->id)}}"> {{$tarea->nombreTarea}} </a></td>
                                <td> {{$tarea->descripcion}}</td>
                            </tr>

                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
