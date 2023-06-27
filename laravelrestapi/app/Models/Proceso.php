<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;
    
    public $table = "PRO_PROCESO";

    protected $fillable = ['PRO_PREFIJO','PRO_NOMBRE'];
}
