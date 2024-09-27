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
        Schema::create('centre_opp_charge', function (Blueprint $table) {
            $table->id(); // serial primary key
            $table->unsignedBigInteger('id_centre_opp');
            $table->foreign('id_centre_opp')->references('id_centre_opp')->on('centre_opp')->onDelete('cascade'); // foreign key reference
            $table->unsignedBigInteger('id_charge');
            $table->foreign('id_charge')->references('id_charge')->on('charge')->onDelete('cascade'); // foreign key reference
            $table->float('pourcentage'); // float
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centre_opp_charge');
    }
};
