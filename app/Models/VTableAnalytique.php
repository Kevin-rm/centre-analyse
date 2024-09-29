<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTableAnalytique extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table='v_table_analytique';
    protected $fillable = [
        'id_charge',
        'nom_charge',
        'total',
        'nature',
        'nom_unite_oeuvre',
        'id_centre_opp',
        'nom_centre_opp',
        'est_structure',
        'pourcentage',
        'variable',
        'fixe',
        'sum_variable',
        'sum_fixe',
        'sum_variable_fixe',
        'total_sum_variable',
        'total_sum_fixe'
    ] ;
}
