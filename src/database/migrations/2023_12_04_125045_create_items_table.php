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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique();
            $table->string('type');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('item_categories');
            $table->string('ISBN')->nullable();
            $table->unsignedBigInteger('rating');
            $table->foreign('rating')->references('id')->on('item_age_ratings');
            $table->bigInteger('borrowing_time')->nullable();
            $table->char('modified_kind' ,1)->default('I');
            $table->unsignedBigInteger('modified_user');
            $table->foreign('modified_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
