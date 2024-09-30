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
        //
        Schema::create('etat_produit', function (Blueprint $table) {
            $table->id('id_etat_produit'); // serial primary key
            $table->unsignedBigInteger('id_unite_oeuvre');
            $table->foreign('id_unite_oeuvre')->references('id_unite_oeuvre')->on('unite_oeuvre')->onDelete('restrict'); // foreign key reference
            $table->string('nom_etat'); // float
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('etat_produit');
    }
};
