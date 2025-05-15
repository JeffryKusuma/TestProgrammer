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
        DB::unprepared('
            DROP FUNCTION IF EXISTS FN_TOTAL;
        ');
        
        DB::unprepared('
            CREATE FUNCTION FN_TOTAL() RETURNS DECIMAL(10,0)
            DETERMINISTIC
            BEGIN
                DECLARE TOTAL INT;
                SELECT SUM(b.quantity * b.unit_price) INTO TOTAL 
                FROM orders a, order_items b 
                WHERE a.id = b.order_id;
                RETURN TOTAL;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS FN_TOTAL');
    }
};
