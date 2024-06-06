<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('director-name', 50)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->string('phone',30)->nullable();
            $table->string('avatar', 100)->nullable();
            $table->string('role', 20)->default('employee');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
