
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
            CREATE OR REPLACE VIEW v_desc_total_par_charge AS
            SELECT 
                id_charge,
                SUM(CASE WHEN nature = TRUE THEN total * pourcentage ELSE 0 END) AS total_sum_variable,
                SUM(CASE WHEN nature = FALSE THEN total * pourcentage ELSE 0 END) AS total_sum_fixe
            FROM 
                v_all_data_view
            GROUP BY 
                id_charge;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_desc_total_par_charge');
    }
};
