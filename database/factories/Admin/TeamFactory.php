<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin\Team;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

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
            'content_uz' => $this->faker->text,
            'content_en' => $this->faker->text,
            'content_ru' => $this->faker->text,
            'biography_uz' => $this->faker->text,
            'biography_en' => $this->faker->text,
            'biography_ru' => $this->faker->text,
            'publication_uz' => $this->faker->text,
            'publication_en' => $this->faker->text,
            'publication_ru' => $this->faker->text,
            'date_mask' => $this->faker->dateTime(),
            'image_url' => $this->faker->word,
            'status' => $this->faker->boolean,
            'order' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
