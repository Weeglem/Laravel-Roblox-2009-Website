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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string("type")->default("model");
            $table->foreignId("owner_id")->references("id")->on("users")->onDelete("cascade");
            $table->string('name',50);
            $table->string('about',10000)->nullable();

            //MOVE TO SEPARATE TABLE

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
