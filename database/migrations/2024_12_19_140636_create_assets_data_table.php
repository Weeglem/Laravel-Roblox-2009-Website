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
        Schema::create('assets_data', function (Blueprint $table) {
            $table->foreignId("asset_id")->autoIncrement()->unique()->references("id")->on("assets")->cascadeOnDelete();
            $table->tinyInteger('is_copylocked')->default(1);
            $table->tinyInteger('is_friends_only')->default(0);
            $table->tinyInteger('comments_allowed')->default(0);
            $table->tinyInteger('on_sale')->default(0);

            $table->tinyInteger('price_ticket')->default(0);
            $table->tinyInteger('price_robux')->default(0);
            $table->tinyInteger('price_free')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets_data');
    }
};
