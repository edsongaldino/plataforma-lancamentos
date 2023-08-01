<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorretorEmpreendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corretor_empreendimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('corretor_id')->unsigned();
            $table->foreign('corretor_id')->references('id')->on('corretor');
            $table->integer('empreendimento_id')->unsigned();
            $table->foreign('empreendimento_id')->references('id')->on('empreendimentos');
            $table->date('data_vencimento')->nullable();
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
        Schema::dropIfExists('corretor_empreendimentos');
    }
}
