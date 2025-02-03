<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruta extends Model {
    protected $table = 'fruta';
    protected $fillable = ['nombre', 'temporada', 'precio', 'stock'];
}