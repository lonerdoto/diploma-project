<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DispatcherApplication>
 */
class DispatcherApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'initiator' => fake()->name(),
            'user_id' => $this->findUser(),
            'system_name' => fake()->safari(),
            'planned_work' => fake()->text(20),
            'work_duration' => null,
            'approval_date' => fake()->dateTimeBetween('-1 month', 'now'),
            'approval_result' => fake()->text(),
            'created_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'status' => $this->findStatus(),
        ];
    }
        private function findStatus()
    {
        $userCount = \App\Models\Status::count();
        do {
            $randomId = rand(1, $userCount);
            $status = \App\Models\Status::find($randomId);
        } while (!$status);
        return $status->status;
    }
        private function findType()
    {
        $typeCount = \App\Models\User::count();
        do {
            $randomId = rand(1, $typeCount);
            $type = \App\Models\ApplicationType::find($randomId);
        } while (!$type);
        return ['id' => $type->id, 'type' => $type->type];
    }
        private function findUser()
    {
        $userCount = \App\Models\User::count();
        do {
            $randomId = rand(1, $userCount);
            $user = \App\Models\User::find($randomId);
        } while (!$user);
        return $user->id;
    }
}
