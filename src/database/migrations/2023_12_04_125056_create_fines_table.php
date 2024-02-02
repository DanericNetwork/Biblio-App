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
        Schema::create('fines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grant_id');
            $table->foreign('grant_id')->references('id')->on('grants')->onDelete("cascade");
            $table->double('amount');
            $table->char('modified_kind' ,1)->default('I');
            $table->unsignedBigInteger('modified_user');
            $table->foreign('modified_user')->references('id')->on('users')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};
