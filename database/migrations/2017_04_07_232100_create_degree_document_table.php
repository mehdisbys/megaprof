<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDegreeDocumentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prof_degree_document', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('degree_document_name', 125);
            $table->string('degree_document_mime', 125);
            $table->integer('degree_document_size');
            $table->boolean('verified')->default(0);
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::statement("ALTER TABLE prof_degree_document ADD degree_document MEDIUMBLOB");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prof_degree_document');
    }

}
