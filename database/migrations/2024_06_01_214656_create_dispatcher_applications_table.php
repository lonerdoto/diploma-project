<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('dispatcher_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->string('initiator', 50)->nullable(); // Инициатор обслуживания или ремонта
            $table->string('system_name', 200)->nullable(); // Наименование инженерной системы (оборудования)
            $table->text('planned_work', 100)->nullable(); // Планируемые работы
            $table->string('work_duration', 20)->nullable(); // Длительность работ
            $table->timestamp('approval_date')->nullable(); // Дата согласования работ
            $table->text('approval_result')->nullable(); // Результат согласования остановки систем
            $table->string('communicated_by', 50)->nullable(); // Кто сообщил инициатору работ о согласовании
            $table->string('status', 30)->default('Новое')->nullable(); // Статус заявки
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispatcher_applications');
    }
};
