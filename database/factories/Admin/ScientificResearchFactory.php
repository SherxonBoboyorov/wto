<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin\ScientificResearch;
use App\Models\Admin\ScientificResearchCategory;

class ScientificResearchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScientificResearch::class;

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
            'sub_content_uz' => $this->faker->text,
            'sub_content_en' => $this->faker->text,
            'sub_content_ru' => $this->faker->text,
            'content_uz' => $this->faker->text,
            'content_en' => $this->faker->text,
            'content_ru' => $this->faker->text,
            'date_mask' => $this->faker->dateTime(),
            'category_id' => ScientificResearchCategory::factory(),
            'image_url' => $this->faker->word,
            'image_main_url' => $this->faker->word,
            'status' => $this->faker->boolean,
            'order' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
