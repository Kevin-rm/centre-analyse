<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatProduit extends Model
{
    use HasFactory;

    protected $primaryKey='id_etat_produit';
    public $incrementing=true;
    protected $keyType='int';
    protected $table='etat_produit';
    protected $fillable = [
        'id_unite_oeuvre',
        'nom_etat'
    ];
}
