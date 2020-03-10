@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @isset($tarea)
                    {{--<form action="{{route('tarea.update', $tarea->id)}}" method="POST">--}}
                    {!! Form::model($tarea, ['route' => ['tarea.update', $tarea->id], 'method' => 'PATCH']) !!}
                        @method('PATCH')
                @else
                    {!! Form::open(['route' => 'tarea.store']) !!}
                    {{--<form action="{{route('tarea.store')}}" method="POST">--}}
                @endisset
                {{--@csrf--}}
                <div class="card-header">Captura nueva tarea</div>

                    <div class="from-grup">
                        {!! Form::label('nombreTarea', 'Tarea') !!}
                        {!! Form::text('nombreTarea', null, ['class' => 'form-control', 'id' => 'formGroupExampleInput', 'placeholder' => 'Tarea XX']) !!}
                        <!--label for="nombreTarea" class="font-weight-bold">Nombre Tarea</label>
                        <input name="nombreTarea" type="text" class="form-control" id="formGroupExampleInput" placeholder="Tarea 1" value="{{--$tarea->nombreTarea ?? ''--}}"-->
                    </div>
                    <div class="from-grup">
                        <label for="fechaInicio" class="font-weight-bold">Fecha inicio</label>
                        {!! Form::date('fechaInicio', isset($tarea) ? $tarea->fechaInicio->toDateString(): null, ['class' => 'form-control']) !!}
                        {{--<input name="fechaInicio" type="date" class="form-control" value="{{$tarea->fechaInicio ?? ''}}">--}}
                    </div>
                    <div class="from-grup">
                        <label for="fechaTermino" class="font-weight-bold">Fecha fin</label>
                        {!! Form::date('fechaTermino', isset($tarea) ? $tarea->fechaTermino->toDateString(): null, ['class' => 'form-control']) !!}
                        {{--<input name="fechaTermino" type="date" class="form-control" value="{{$tarea->fechaTermino ?? ''}}">--}}
                    </div>
                    <div class="from-grup">
                        <label for="descripcion" class="font-weight-bold">Descripcion</label><br>
                        {!! Form::textarea('descripcion', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'exampleFormControlTextarea1', 'placeholder' => 'Lo que aprendi en la escuela de botes es...']) !!}
                        {{--<textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Lo que aprendi en la escuela de botes es...">{{$tarea->descripcion ?? ''}}</textarea>--}}
                    </div>
                    <div class="from-grup">
                        <label for="prioridad" class="font-weight-bold">Prioridad</label>
                        {!! Form::select('prioridad', [
                            '1' => 'Baja',
                            '2' => 'Media',
                            '3' => 'Alta'
                            ], null, ['class' => 'form-control']) !!}
                        {{--<select name="prioridad" id="prioridad">
                        <option value="1" {{isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}>BAJA</option>
                        <option value="2" {{isset($tarea) && $tarea->prioridad == 2 ? 'selected' : ''}}>MEDIA</option>
                        <option value="3" {{isset($tarea) && $tarea->prioridad == 3 ? 'selected' : ''}}>ALTA</option>
                        </select>--}}
                    </div>
                    <div class="from-grup">
                        <label for="categoria" class="font-weight-bold">Categoria</label>
                        {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
                    </div>
                <div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
