<?php namespace Dieter\Pages\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePagePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('dieter_pages_page_photos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
			$table->integer('sort_order')->nullable();
			$table->integer('page_id')->length(11)->unsigned();
			$table->foreign('page_id')->references('id')->on('dieter_pages_page');
			$table->string('photo');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dieter_pages_page_photos');
    }
}
