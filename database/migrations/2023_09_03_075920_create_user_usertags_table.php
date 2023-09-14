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
        Schema::create('user_usertags', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('usertag_id')->constrained();
            
            $table->unique([
                'user_id',
                'usertag_id'
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
        Schema::dropIfExists('user_usertags');
    }
};
