<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UniteOeuvre extends Model
{
    use HasFactory;

    protected $table = 'unite_oeuvre';
    protected $primaryKey = 'id_unite_oeuvre'; // Définir la clé primaire
    public $incrementing = true; // La clé primaire est auto-incrémentée
    protected $keyType = 'int'; // Type de la clé primaire
    protected $fillable = [
        'nom_unite_oeuvre',
    ];
    
    public function charges()
    {
        return $this->hasMany(Charge::class, 'id_unite_oeuvre', 'id_unite_oeuvre');
    }
}
