<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('case_number');
            $table->integer('year');
            $table->integer('bench_id')->default(1)->comment('bench id from bench table');
            $table->integer('case_side_id')->default(1)->comment('side code from side table');
            $table->integer('stamp_register_id')->default(1)->comment('stamp or register');
            $table->integer('case_type_id')->default(1);
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
        Schema::dropIfExists('matters');
    }
}
