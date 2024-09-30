<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VRepartition extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "v_repartition";
    protected $fillable = [
        'id_centre_opp',
        'cout_direct',
        'total_general',
        'cles',
        'ADM/DIST',
        'cout_total'
    ] ;
}
