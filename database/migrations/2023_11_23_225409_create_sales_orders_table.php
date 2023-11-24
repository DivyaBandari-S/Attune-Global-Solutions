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
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->string('so_number')->nullable()->default(null)->unique();
            $table->string('vendor_id'); // Assuming a 'vendors' table exists
            $table->string('customer_id'); // Assuming a 'vendors' table exists
            $table->string('rate');
            $table->string('end_client_timesheet_required')->nullable()->default('not required');
            $table->string('time_sheet_type')->nullable();
            $table->string('time_sheet_begins')->nullable();
            $table->string('invoice_type');
            $table->string('payment_type');
            $table->foreign('vendor_id')
                ->references('vendor_id')
                ->on('vendor_details')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customer_details')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });
        $triggerSQL = <<<SQL
        CREATE TRIGGER generate_so_number BEFORE INSERT ON sales_orders FOR EACH ROW
        BEGIN
            -- Check if hr_id is NULL
            IF NEW.so_number IS NULL THEN
                -- Find the maximum hr_id value in the hr_details table
                SET @max_id := IFNULL((SELECT MAX(CAST(SUBSTRING(so_number, 3) AS UNSIGNED)) + 1 FROM sales_orders), 100000);

                -- Increment the max_id and assign it to the new hr_id
                SET NEW.so_number = CONCAT('SO', LPAD(@max_id, 6, '0'));
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
        Schema::dropIfExists('sales_orders');
    }
};
