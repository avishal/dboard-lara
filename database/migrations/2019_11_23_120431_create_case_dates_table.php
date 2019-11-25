<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matter_id');
            $table->date('next_date');
            $table->text('description')->nullable();
            $table->text('remark')->nullable();
            $table->string('crno')->nullable();
            $table->string('srno')->nullable();
            $table->enum('status',['pending','completed'])->nullable();
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
        Schema::dropIfExists('case_dates');
    }
}
