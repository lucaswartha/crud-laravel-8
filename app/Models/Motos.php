<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motos extends Model
{
    use HasFactory;

    protected $table =  'motos';
    protected $fillable =  ['modeloMoto','marcaMoto','anoMoto','imagemMoto'];

    
}
