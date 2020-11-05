<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
			$table->unsignedBigInteger('parent_id');
			$table->unsignedBigInteger('child_id');
             $table->foreign('parent_id')
				  ->references('id')
				  ->on('nodes')
				  ->onDelete('CASCADE');

        $table->foreign('child_id')
				  ->references('id')
				  ->on('nodes')
				  ->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relations');
		Schema::table('nodes', function(Blueprint $table) {
			$table->dropColumn('parent_id');
			$table->dropForeign(['parent_id']);
			});
			Schema::table('nodes', function(Blueprint $table) {
			$table->dropColumn('child_id');
			$table->dropForeign(['child_id']);
			});
    }
}
