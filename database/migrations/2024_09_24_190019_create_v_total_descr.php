
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
            CREATE OR REPLACE VIEW total_descr AS
SELECT
    -- Agrégation des données depuis la première vue
    (SELECT SUM(a.total) FROM charge a) AS sum_charge,
    
    -- Agrégation des données depuis la deuxième vue
    (SELECT SUM(b.total_sum_variable) FROM v_desc_total_par_charge b) AS sum_total_sum_variable,
    
    (SELECT SUM(b.total_sum_fixe) FROM v_desc_total_par_charge b) AS sum_total_sum_fixe;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS total_descr');
    }
};
