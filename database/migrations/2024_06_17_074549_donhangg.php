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
        //
        Schema::create('donhang',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_khachhang');
            $table->integer('id_sp');
            $table->integer('soluong');
            $table->integer('gia');
            $table->string('phone');
            $table->string('address');
            $table->dateTime('ngaydat');
            $table->integer('trangthai');
            $table->integer('thanhtoan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('donhang');
    }
};
