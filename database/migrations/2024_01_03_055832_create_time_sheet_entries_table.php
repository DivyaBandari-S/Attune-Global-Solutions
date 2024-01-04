<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTimeSheetEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sheet_entries', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->json('day')->default(json_encode([
                'mon' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'tue' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'wed' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'thu' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'fri' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'sat' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
                'sun' => ['date' => null, 'regular' => 0, 'sick' => 0, 'holiday' => 0, 'vacation' => 0, 'casual' => 0],
            ]));
            $table->json('hr_id')->default(json_encode([]));
            $table->string('company_id');
            $table->string('status');
            $table->unique(['emp_id', 'day']);
           
            $table->foreign('company_id')->references('company_id')->on('company_details')->onDelete('restrict')->onUpdate('restrict');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_sheet_entries');
    }
}
