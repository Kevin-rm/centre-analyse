
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
            CREATE OR REPLACE VIEW v_table_analytique AS
SELECT 
    a.id_charge,
    a.nom_charge,
    a.total,
    a.nature,
    a.nom_unite_oeuvre,
    a.id_centre_opp,
    a.nom_centre_opp,
    a.est_structure,
    a.pourcentage,
    a.variable,
    a.fixe,
    c.sum_variable,
    c.sum_fixe ,
    c.sum_variable_fixe ,
    ch.total_sum_variable,
    ch.total_sum_fixe
FROM 
    v_all_data a
JOIN 
    v_desc_total_par_co c ON a.id_centre_opp = c.id_centre_opp
JOIN 
    v_desc_total_par_charge ch ON a.id_charge = ch.id_charge;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_table_analytique');
    }
};
