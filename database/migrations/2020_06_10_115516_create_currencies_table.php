<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up():void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('currency');
            $table->integer('value');
            $table->string('recorded_at');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('currencies');
    }
}
