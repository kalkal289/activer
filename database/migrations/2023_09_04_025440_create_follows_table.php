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
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('follower_id')->cascadeOnDelete()->constrained('users')->comment('フォローしてる人のID');
            $table->foreignId('followed_id')->cascadeOnDelete()->constrained('users')->comment('フォローされてる人のID');
            
            //フォローの重複を防ぐ
            $table->unique([
                'follower_id',
                'followed_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
};
