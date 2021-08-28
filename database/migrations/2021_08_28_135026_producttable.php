<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Producttable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'products', function ( Blueprint $table ) {
		  $table->increments( 'id' );
		  $table->string( 'title' );
		  $table->text('description');
          $table->string('slug');
		  $table->double( 'price' );
		  $table->string('details');
		  $table->tinyInteger( 'in_stock' )->default( 1 );
		  $table->tinyInteger( 'status' )->default( 0 );
		  $table->timestamps();
		  $table->softDeletes();
        });
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
