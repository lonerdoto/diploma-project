<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('application_types', function (Blueprint $table) {
            $table->id();
            $table->string('type', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('application_types');
    }
};
