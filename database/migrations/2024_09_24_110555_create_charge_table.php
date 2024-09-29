
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
       Schema::create("charge", function (Blueprint $table) {
        $table->id("id_charge");
        $table->string("nom_charge");
        $table->float("total");
        $table->boolean("nature");
        $table->unsignedBigInteger("id_unite_oeuvre");
        $table->foreign("id_unite_oeuvre")->references("id_unite_oeuvre")->on("unite_oeuvre")->onDelete("restrict");
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("charge");
    }
};
