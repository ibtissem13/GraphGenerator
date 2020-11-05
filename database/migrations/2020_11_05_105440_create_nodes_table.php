<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
			$table->unsignedBigInteger('graph_id');
           
			$table->foreign('graph_id')
			      ->references('id')
			      ->on('graphs')
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
        Schema::dropIfExists('nodes');
		
			Schema::table('graphs', function(Blueprint $table) {
			$table->dropColumn('graph_id');
			$table->dropForeign(['graph_id']);
});
    }
}
