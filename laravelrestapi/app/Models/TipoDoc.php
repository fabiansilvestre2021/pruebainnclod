<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model
{
    use HasFactory;
    
    public $table = "TIP_TIPO_DOC";

    protected $fillable = ['TIP_NOMBRE','TIP_PREFIJO'];
}
