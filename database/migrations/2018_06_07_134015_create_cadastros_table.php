<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cadastros', function(Blueprint $table)
		{
            $table->increments('id');
            //$table->integer('id')->unsigned()->primary();
			$table->string('name');
			$table->string('email')->unique('email_UNIQUE');
			$table->string('phone', 15);
			$table->string('address');
			$table->integer('address_nro');
			$table->string('city');
            $table->string('state', 2)->nullable(false);
            $table->integer('estado_id');
            $table->string('pobox', 9);
            $table->boolean('deleted')->default(false);
            //$table->timestamp('created_at');
            //$table->timestamp('updated_at');
            //$table->timestamp('deleted_at');
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
		Schema::drop('cadastros');
	}

}
