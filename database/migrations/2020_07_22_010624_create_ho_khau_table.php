<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoKhauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ho_khau', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hk_cd');
            $table->integer('chu_ho_id')->nullable();
            $table->string('dia_chi');
            $table->date('ngay_cap');
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
        Schema::dropIfExists('ho_khau');
    }
}
