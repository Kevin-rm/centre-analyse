<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('etat_produit_centre_assoc', function (Blueprint $table) {
            $table->id(); // serial primary key
            $table->unsignedBigInteger('id_etat_produit');
            $table->foreign('id_etat_produit')->references('id_etat_produit')->on('etat_produit')->onDelete('restrict'); // foreign key reference
            $table->unsignedBigInteger('id_centre_opp');
            $table->foreign('id_centre_opp')->references('id_centre_opp')->on('centre_opp')->onDelete('restrict'); // foreign key reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
