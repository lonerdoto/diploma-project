<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeApplication>
 */
class EmployeeApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->findUser(),
            'application_type_id' => $this->findType()['id'],
            'description' => fake()->realText,
            'files' => "[]",
            'type' => $this->findType()['type'],
            'status' => $this->findStatus(),
            'created_at' => fake()->dateTimeBetween('-1 month', 'now'),
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
