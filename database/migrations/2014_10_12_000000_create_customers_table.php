<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surnames')->nullable();
            $table->string('phone',100)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('actived')->default(true);  
            $table->boolean('verified')->default(false);

            $table->integer('document_id')->nullable()->unsigned();
            $table->foreign('document_id')->references('id')->on('documents');
            
            $table->string('document_number',20)->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
