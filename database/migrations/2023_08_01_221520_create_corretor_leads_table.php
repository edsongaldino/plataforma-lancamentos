<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorretorLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corretor_leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('corretor_id')->unsigned();
            $table->foreign('corretor_id')->references('id')->on('corretor');
            $table->integer('lead_id')->unsigned();
            $table->foreign('lead_id')->references('id')->on('leads');
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
        Schema::dropIfExists('corretor_leads');
    }
}
