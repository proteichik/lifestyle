<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToSubcategoriesInPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->index('category_id');
            $table->index('subcategory_id');
            $table->index(['category_id', 'subcategory_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_category_id_index');
            $table->dropIndex('posts_subcategory_id_index');
            $table->dropIndex('posts_category_id_subcategory_id_index');
        });
    }
}
