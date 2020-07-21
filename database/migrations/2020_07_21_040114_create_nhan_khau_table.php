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
            $table->string("Ho_Ten", '50');
            $table->date('Ngay_Sinh');
            $table->date('Ngay_Mat');
            $table->string('Gioi_Tinh', '3');
            $table->string('Quan_He', '30');
            $table->string('Email', '50')->nullable();
            $table->string('SDT', '10');
            $table->date('Ngay_Nhap_Khau');
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
        Schema::dropIfExists('NhanKhau');
    }
}
