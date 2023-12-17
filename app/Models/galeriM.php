<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeriM extends Model
{
    use HasFactory;
    protected $table = "galeri";
    protected $primaryKey = "idgaleri";
    protected $guarded = [];
}
