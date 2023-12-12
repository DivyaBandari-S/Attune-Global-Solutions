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
        Schema::create('time_sheet_entries', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->json('hr_id')->default(json_encode([]));
            $table->string('company_id');
            $table->json('day')->default(json_encode([
                'mon' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'tue' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'wed' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'thu' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'fri' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'sat' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'sun' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
            ]));
            $table->string('status')->default('pending');
            $table->foreign('emp_id')->references('emp_id')->on('emp_details')->onDelete('cascade')->onUpdate('cascade');
           // $table->foreign('hr_id')->references('hr_id')->on('hr_details')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')->references('company_id')->on('company_details')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_sheet_entriess');
    }
};
