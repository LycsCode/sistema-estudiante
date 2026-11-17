<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'personal';

    protected $primaryKey = 'ID';

    public $incrementing = false;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'ID',
        'Nombre',
        'Correo',
        'Asignatura'
    ];
}
