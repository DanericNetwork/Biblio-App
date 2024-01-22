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
      Schema::table('items', function (Blueprint $table) {
        // remove category column
        $table->dropForeign(['category']);
        $table->dropColumn('category');

        // remove rating column
        $table->dropForeign(['rating']);
        $table->dropColumn('rating');

        // add category_id column
        $table->unsignedBigInteger('category_id')->nullable()->after('description');
        $table->foreign('category_id')->references('id')->on('item_categories');

        // add rating_id column
        $table->unsignedBigInteger('rating_id')->nullable()->after('ISBN');
        $table->foreign('rating_id')->references('id')->on('item_age_ratings');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('items', function (Blueprint $table) {
        $table->renameColumn('category_id', 'category');
      });
    }
};
