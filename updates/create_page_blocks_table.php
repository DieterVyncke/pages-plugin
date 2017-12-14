<?php namespace DieterVyncke\Pages\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePageBlocksTable extends Migration
{
    public function up()
    {
        Schema::create('dietervyncke_pages_page_blocks', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->timestamp('created_at')->nullable();
		 	$table->timestamp('updated_at')->nullable();
		 	$table->string('title');
			$table->text('body');
			$table->integer('sort_order')->nullable();
			$table->integer('page_id')->length(11)->unsigned();
			$table->foreign('page_id')->references('id')->on('dietervyncke_pages_page');
			$table->string('photo')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dietervyncke_pages_page_blocks');
    }
}
