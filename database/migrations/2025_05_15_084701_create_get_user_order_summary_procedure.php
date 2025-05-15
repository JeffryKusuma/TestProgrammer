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
            DROP PROCEDURE IF EXISTS GetUserOrderSummary;
        ');
        
        DB::unprepared('
            CREATE PROCEDURE GetUserOrderSummary(IN p_user_id INT)
            BEGIN 
                DECLARE PTOTAL INT;
                SELECT COUNT(status) INTO PTOTAL 
                    FROM orders1 
                            WHERE user_id = p_user_id AND status = "success";
                IF PTOTAL>0 THEN
                            SELECT 
                                IFNULL(total_amount, 0) AS total_amount,
                                COUNT(status) AS total,
                                IFNULL(status, "No success order") AS status
                            FROM orders1 
                            WHERE user_id = p_user_id AND status = "success"
                    group by total_amount,status;
                ELSE
                    SELECT 0 AS total_amount,0 as total,"No success order" as status;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GetUserOrderSummary');
    }
};
