<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';

    protected $fillable = [
        'apellidos',
        'nombre',
        'nacionalidad',
        'sexo',
        'edad',
    ];

   //Un autor tendrá muchos libros
    public function libros()
    {
        return $this->hasMany(Libro::class, 'autor_id');
    }
}


