<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorretorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corretor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cnpj');
            $table->string('creci');
            $table->string('email');
            $table->string('telefone');
            $table->string('whatsapp');
            $table->string('password');
            $table->string('foto');
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
        Schema::dropIfExists('corretors');
    }
}
