<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::statement("CREATE OR REPLACE VIEW v_repartition AS
SELECT
    id_centre_opp,  
    sum_variable_fixe as cout_direct,
    (SELECT sum(sum_variable_fixe) FROM v_desc_total_par_co WHERE est_structure = FALSE) as total_general,                 
    sum_variable_fixe / (SELECT sum(sum_variable_fixe) FROM v_desc_total_par_co WHERE est_structure = FALSE) as cles ,
    (SELECT sum(sum_charge) FROM total_descr) * (sum_variable_fixe / (SELECT sum(sum_variable_fixe) FROM v_desc_total_par_co WHERE est_structure = FALSE)) as \"ADM/DIST\",
    sum_variable_fixe + (SELECT sum(sum_charge) FROM total_descr) * (sum_variable_fixe / (SELECT sum(sum_variable_fixe) FROM v_desc_total_par_co WHERE est_structure = FALSE)) as cout_total
FROM
    v_desc_total_par_co
WHERE
    est_structure = FALSE;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_repartition');
        //
    }
};
