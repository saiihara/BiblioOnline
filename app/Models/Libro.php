<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'categoria',
        'autor_id',
        'descripcion',
        'precio',
    ];



    //Un libro solo puede pertenecer a un autor solo
    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
}
?>