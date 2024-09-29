<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VDescTotalParCo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'v_desc_total_par_co';

    protected $fillable = [
        'id_centre_opp',
        'est_structure',
        'sum_variable',
        'sum_fixe',
        'sum_variable_fixe'
    ];
}
