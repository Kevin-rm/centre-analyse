<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreOperationel extends Model
{
    use HasFactory;

    protected $table='centre_opp';
    protected $primaryKey='id_centre_opp';
    public $incrementing=true;
    protected $keyType='int';
    protected $fillable = [
        'nom_centre_opp',
        'est_structure',
    ];
    
    public function pourcentageCharge()
    {
        return $this->hasMany(PourcentageCharge::class, 'id_centre_opp', 'id_centre_opp');
    }
}
