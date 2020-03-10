<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperar todas las tareas de la base de datos
        //$tarea = consulta
        $tareas = Tarea::all();

        return view('tareas.tareasIndex', compact('tareas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all()->pluck('nombre_categoria', 'id');
        return view('tareas.tareasForm', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombreTarea' => 'required|max:255',
            'fechaInicio' => 'required|date',
            'fechaTermino' => 'required|date',
            'descripcion' => 'required',
            'prioridad' => 'required|int|min:1|max:10'
        ]);

        $request->merge(['user_id' => \Auth::id()]);
        Tarea::create($request->all());

        /*$tarea = new Tarea();

        $tarea->user_id = \Auth::id();

        $tarea->nombreTarea = $request->nombreTarea;
        $tarea->fechaInicio = $request->fechaInicio;
        $tarea->fechaTermino = $request->fechaTermino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->categoria_id = $request->categoria_id;

        $tarea->save();*/
        return redirect()->route('tarea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        //
        return view('tareas.tareasShow', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        //
        $categorias = Categoria::all()->pluck('nombre_categoria', 'id');
        return view('tareas.tareasForm', compact('tarea','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        //

        $request->validate([
            'nombreTarea' => 'required|max:255',
            'fechaInicio' => 'required|date',
            'fechaTermino' => 'required|date',
            'descripcion' => 'required',
            'prioridad' => 'required|int|min:1|max:10'
        ]);

        Tarea::where('id', $tarea->id)->update($request->except('_token','_method'));

        /*
        $tarea->nombreTarea = $request->nombreTarea;
        $tarea->fechaInicio = $request->fechaInicio;
        $tarea->fechaTermino = $request->fechaTermino;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->categoria_id = $request->categoria_id;

        $tarea->save();*/
        return redirect()->route('tarea.show', $tarea->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        //
        $tarea->delete();
        return redirect()->route('tarea.index');
    }
}
