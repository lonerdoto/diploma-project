<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DispatcherApplication;
use App\Models\EmployeeApplication;
use Database\Factories\EmployeeApplicationFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create(['name' => 'admin']);
        \App\Models\Role::create(['name' => 'dispatcher']);
        \App\Models\Role::create(['name' => 'employee']);

        \App\Models\Status::create(['status' => 'Новое']);
        \App\Models\Status::create(['status' => 'Принято']);
        \App\Models\Status::create(['status' => 'В работе']);
        \App\Models\Status::create(['status' => 'Отклонено']);

        \App\Models\ApplicationType::create(['type' => 'Жалоба']);
        \App\Models\ApplicationType::create(['type' => 'Отзыв']);
        \App\Models\ApplicationType::create(['type' => 'Предложение']);


        $credentials = [
            'name' => "Котляров Игорь Сергеевич",
            'email' => "kotlyarov@mail.ru",
            'role' => "admin",
            'password' => '$2y$10$D8zXV51jxM0HZJAWDnzzrOAZvOigyczqB04tfoP5XSofieK8o0fxu'
        ];
        \App\Models\User::create($credentials);

        \App\Models\User::factory(168)->create();

        EmployeeApplication::factory(658)->create();
        DispatcherApplication::factory(242)->create();

    }
}
