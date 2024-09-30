<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatProduitAssoc extends Model
{
    use HasFactory;
    protected $table='etat_produit_centre_assoc';

    protected $fillable=['id_etat_produit','id_centre_opp'];
}
