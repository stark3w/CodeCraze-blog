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
        Schema::create('Post', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('views')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->index('category_id', 'post_category_idx');
            $table->foreign('category_id', 'post_category_fk')->references('id')->on('categories');


            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Post');
    }
};
