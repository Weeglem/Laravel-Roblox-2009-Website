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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('to_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->text('message');

            $table->tinyInteger('seen')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->tinyInteger('friend_request')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
