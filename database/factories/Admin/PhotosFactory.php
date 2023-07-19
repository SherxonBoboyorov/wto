<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin\Gallery;
use App\Models\Admin\Photos;

class PhotosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_url' => $this->faker->word,
            'title_uz' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'title_en' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'title_ru' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'gallery_id' => Gallery::factory(),
            'status' => $this->faker->boolean,
            'order' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
