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
        Schema::create("product",function(Blueprint $table){
            $table->increments("id");
            $table->string("tensp");
            $table->bigInteger("id_danhmuc");
            $table->integer("soluong");
            $table->integer("gia");
            $table->text("thongtin");
            $table->char("image",100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("product");
    }
};
