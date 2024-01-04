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
        Schema::create('sopos', function (Blueprint $table) {
            $table->id();
            $table->string('sopo_number')->nullable()->default(null)->unique();
            $table->string('so_number')->nullable()->default(null)->unique();
            $table->string('po_number')->nullable()->default(null)->unique();
            $table->foreign('so_number')
                ->references('so_number')
                ->on('sales_orders')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('po_number')
                ->references('po_number')
                ->on('purchase_orders')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });
        $triggerSQL = <<<SQL
        CREATE TRIGGER generate_sopo_number BEFORE INSERT ON sopos FOR EACH ROW
        BEGIN
            -- Check if hr_id is NULL
            IF NEW.sopo_number IS NULL THEN
                -- Find the maximum hr_id value in the hr_details table
                SET @max_id := IFNULL((SELECT MAX(CAST(SUBSTRING(sopo_number, 3) AS UNSIGNED)) + 1 FROM sopos), 100000);

                -- Increment the max_id and assign it to the new hr_id
                SET NEW.sopo_number = CONCAT('12', LPAD(@max_id, 6, '0'));
            END IF;
        END;
    SQL;

        DB::unprepared($triggerSQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sopos');
    }
};
