<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ma_san_pham'); // id sản phẩm
            $table->unsignedBigInteger('user_id');     // id user
            $table->tinyInteger('rating');             // 1-5 sao
            $table->text('comment');                   // nội dung đánh giá
            $table->timestamps();
    
            $table->foreign('ma_san_pham')->references('ma_san_pham')->on('san_pham')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
