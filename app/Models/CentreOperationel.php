<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreOperationel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }

    public function pourcentageCharges()
    {
        return $this->hasMany(PourcentageCharge::class);
    }
}
