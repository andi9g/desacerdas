<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontenM extends Model
{
    use HasFactory;
    protected $table = "konten";
    protected $primaryKey = "idkonten";
    protected $guarded = [];
}
