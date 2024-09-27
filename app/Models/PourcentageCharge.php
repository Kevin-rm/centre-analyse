<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PourcentageCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'pourcentage',
        'charge_id', // Relation vers Charge
        'centre_operationel_id', // Relation vers CentreOperationel
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
