<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentarM extends Model
{
    use HasFactory;

    protected $table = "komentar";
    protected $primaryKey = "idkomentar";
    protected $guarded = [];
    
}
