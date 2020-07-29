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
        Schema::create('nhan_khau', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hk_id')->unsigned()->nullable();
            $table->string('user')->nullable();
            $table->string('password')->nullable();
            $table->string("ho_ten", '50');
            $table->string("hinh_anh", '500')->nullable();
            $table->date('ngay_sinh');
            $table->date('ngay_mat')->nullable();
            $table->string('gioi_tinh', '3');
            $table->string('quan_he', '30');
            $table->string('email', '50')->nullable();
            $table->string('sdt', '10');
            $table->date('ngay_nhap_khau');
            $table->foreign('hk_id')->references('id')->on('ho_khau')->ondelete('cascade');
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
        Schema::dropIfExists('nhan_khau');
    }
}
