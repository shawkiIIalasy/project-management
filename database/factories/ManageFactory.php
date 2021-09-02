<?php

namespace Database\Factories;

use App\Models\Manage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'access_code' => 'ADM_123456',
        ];
    }
}
