<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SearchResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_results_table', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('count')->unsigned();
            $table->integer('subjectId')->unsigned();
            $table->foreign('subjectId')->references('id')->on('sub_subjects');
            $table->string('subjectName', 100);
            $table->string('location', 100);
            $table->string('ip', 40);
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
        Schema::drop('search_results_table');
    }
}
