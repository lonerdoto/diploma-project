<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employee_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\ApplicationType::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Status::class)->constrained()->cascadeOnDelete();
            $table->text('description');
            $table->string('type', 30);
            $table->string('status', 30)->default('Новое');
            $table->jsonb('files')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_applications');
    }
};
