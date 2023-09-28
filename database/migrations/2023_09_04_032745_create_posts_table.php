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
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->cascadeOnDelete()->constrained();
            $table->foreignId('category_id')->nullOnDelete()->constrained()->comment('カテゴリーID'); //ID「0」は「カテゴリーなし」
            $table->string('content', 300)->nullable()->comment('本文');
            $table->string('image1')->nullable()->comment('添付画像1');
            $table->string('image2')->nullable()->comment('添付画像2');
            $table->string('image3')->nullable()->comment('添付画像3');
            $table->string('image4')->nullable()->comment('添付画像4');
            $table->boolean('is_big_post')->default(0)->comment('この投稿がビッグポストか否か');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
