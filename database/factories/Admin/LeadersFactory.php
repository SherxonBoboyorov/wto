<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin\Leaders;

class LeadersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leaders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_url' => $this->faker->word,
            'name_uz' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'name_en' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'name_ru' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'position_uz' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'position_en' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'position_ru' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'phone' => $this->faker->phoneNumber,
            'reception_days_uz' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'reception_days_en' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'reception_days_ru' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'email' => $this->faker->safeEmail,
            'content_uz' => $this->faker->text,
            'content_en' => $this->faker->text,
            'content_ru' => $this->faker->text,
            'order' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->boolean,
        ];
    }
}
