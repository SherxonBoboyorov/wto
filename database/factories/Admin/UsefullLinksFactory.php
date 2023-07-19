<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin\UsefullLinks;

class UsefullLinksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsefullLinks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_uz' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'title_en' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'title_ru' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'image_url' => $this->faker->word,
            'redirect_url' => $this->faker->word,
            'status' => $this->faker->boolean,
            'order' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
