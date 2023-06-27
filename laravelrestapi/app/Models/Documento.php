<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    public $table = "DOC_DOCUMENTO";

    protected $fillable = ['DOC_NOMBRE','DOC_CODIGO','DOC_CONTENIDO','DOC_ID_TIPO','DOC_ID_PROCESO'];
}
