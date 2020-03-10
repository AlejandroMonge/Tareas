<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['user_id','descipcion','prioridad','categoria_id'
    ,'fechaInicio', 'fechaTermino', 'created_at', 'updated_at'];
    protected $dates = ['fechaInicio', 'fechaTermino', 'created_at', 'updated_at'];
    //
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
