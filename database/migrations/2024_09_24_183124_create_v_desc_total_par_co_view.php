
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
            CREATE OR REPLACE VIEW v_desc_total_par_co AS
SELECT 
    id_centre_opp,
    est_structure,
    SUM(CASE WHEN nature = TRUE THEN total * pourcentage  ELSE 0 END) AS sum_variable,
    SUM(CASE WHEN nature = FALSE THEN total * pourcentage ELSE 0 END) AS sum_fixe,
    SUM(CASE WHEN nature = TRUE OR nature = FALSE THEN total * pourcentage ELSE 0 END) AS sum_variable_fixe
FROM v_all_data
GROUP BY id_centre_opp,est_structure;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_desc_total_par_co');
    }
};
