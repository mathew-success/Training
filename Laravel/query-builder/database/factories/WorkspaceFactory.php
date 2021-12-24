<?php

namespace Database\Factories;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkspaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Workspace::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'organization_id' => rand(1,3)
        ];
    }
}
