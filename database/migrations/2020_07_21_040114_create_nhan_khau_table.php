<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanKhauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NhanKhau', function (Blueprint $table) {
            $table->Increments('ID');
            $table->timestamps();
            $table->time('Ngay_Sinh');
            $table->time('Ngay_Mat');
            $table->string('Gioi_Tinh','3');
            $table->string('Quan_He','30');
            $table->string('Email','50')->nullable();
            $table->string('SDT','10');
            $table->time('Ngay_Nhap_Khau');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NhanKhau');
    }
}
