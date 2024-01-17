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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('modified_kind' ,1)->default('I');
            $table->unsignedBigInteger('modified_user');
            $table->foreign('modified_user')->references('id')->on('users')->onDelete("cascade");
            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable()->after('name');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->dropColumn('author');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
