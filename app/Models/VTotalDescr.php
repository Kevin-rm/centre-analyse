<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTotalDescr extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table='total_descr';

    protected $fillable=['sum_charge','sum_total_sum_variable','sum_total_sum_fixe'];
}
