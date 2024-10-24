<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
            $table->integer('rating')->between(1, 5); 
            $table->text('review')->nullable(); 
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
