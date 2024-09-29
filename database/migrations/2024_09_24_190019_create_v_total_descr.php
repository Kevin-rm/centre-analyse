
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
    SUM(a.total) AS sum_charge,
    SUM(b.total_sum_variable) AS sum_total_sum_variable,
    SUM(b.total_sum_fixe) AS sum_total_sum_fixe
FROM 
    v_all_data a,
    v_desc_total_par_charge b;
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
