<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('product_reviews', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('product_id');
                $table->tinyInteger('rating');
                $table->text('comment');
                $table->timestamps();
    
                // Khóa ngoại
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('product_id')->references('ma_san_pham')->on('san_pham')->onDelete('cascade');
            });
        }
    
        public function down(): void
        {
            Schema::dropIfExists('product_reviews');
        }
    };
