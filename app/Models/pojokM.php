<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pojokM extends Model
{
    use HasFactory;
    protected $table = "pojok";
    protected $primaryKey = "idpojok";
    protected $guarded = [];
}
