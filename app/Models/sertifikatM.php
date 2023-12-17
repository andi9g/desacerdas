<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertifikatM extends Model
{
    use HasFactory;

    protected $table = "sertifikat";
    protected $primaryKey = "idsertifikat";
    protected $guarded = [];

}
