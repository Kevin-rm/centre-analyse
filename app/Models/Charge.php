<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_rubrique',
        'total',
        'unite_d_oeuvre',
        'est_variable',
        'centre_operationel_id', // Relation vers CentreOperationel
    ];

    public function centreOperationel()
    {
        return $this->belongsTo(CentreOperationel::class);
    }
}
