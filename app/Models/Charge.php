<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;
    protected $table='charge';
    protected $primaryKey='id_charge';
    public $incrementing=true;
    protected $keyType='int';
    protected $fillable = [
        'nom_charge',
        'total',
        'nature',
        'id_unite_oeuvre',
    ];

    public function charges()
    {
        return $this->hasMany(Charge::class, 'id_unite_oeuvre', 'id_unite_oeuvre');
    }
}
