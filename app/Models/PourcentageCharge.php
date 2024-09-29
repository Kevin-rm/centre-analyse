<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PourcentageCharge extends Model
{
    use HasFactory;

    protected $table = "centre_opp_charge";
    protected $fillable = [
        'id_charge', // Relation vers Charge
        'id_centre_opp', // Relation vers CentreOperationel
        'pourcentage',
    ];

    public function charge()
    {
        return $this->belongsTo(Charge::class);
    }

    public function centreOperationel()
    {
        return $this->belongsTo(CentreOperationel::class);
    }
}
