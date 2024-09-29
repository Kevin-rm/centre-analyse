
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW v_all_data AS
SELECT 
    ch.id_charge,
    ch.nom_charge,
    ch.total,
    ch.nature,
    uo.nom_unite_oeuvre,
    co.id_centre_opp,
    co.nom_centre_opp,
    co.est_structure,
    coc.pourcentage,
    CASE 
        WHEN ch.nature = TRUE THEN ch.total * coc.pourcentage
        ELSE 0
    END AS variable,
    CASE 
        WHEN ch.nature = FALSE THEN ch.total * coc.pourcentage
        ELSE 0
    END AS fixe
FROM 
    charge ch
JOIN 
    unite_oeuvre uo ON ch.id_unite_oeuvre = uo.id_unite_oeuvre
JOIN 
    centre_opp_charge coc ON ch.id_charge = coc.id_charge
JOIN 
    centre_opp co ON coc.id_centre_opp = co.id_centre_opp;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_all_data_view');
    }
};
