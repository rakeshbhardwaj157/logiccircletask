<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
              $table->increments( 'id' );
			  $table->string( 'download_file' );
			  $table->integer( 'download_permission' )->default( 2 );
			  $table->integer( 'download_count' )->default( 0 );
			  $table->tinyInteger( 'email_status' )->default( 0 );
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
        Schema::dropIfExists('emails');
    }
}
