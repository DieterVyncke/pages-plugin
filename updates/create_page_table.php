<?php namespace Dieter\Pages\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePageTable extends Migration
{
    public function up()
    {
        Schema::create('dieter_pages_page', function(Blueprint $table) {
			$table->engine = 'InnoDB';
 		   	$table->increments('id');
 		   	$table->timestamp('created_at')->nullable();
 		   	$table->timestamp('updated_at')->nullable();
 		   	$table->string('title');
 		   	$table->string('type');
			$table->string('slug')->index()->unique();
			$table->integer('sort_order')->nullable();
			$table->string('photo')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dieter_pages_page');
    }
}
