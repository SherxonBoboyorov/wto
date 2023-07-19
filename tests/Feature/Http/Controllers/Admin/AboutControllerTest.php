<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\AboutController
 */
class AboutControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $abouts = About::factory()->count(3)->create();

        $response = $this->get(route('about.index'));

        $response->assertOk();
        $response->assertViewIs('about.index');
        $response->assertViewHas('abouts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('about.create'));

        $response->assertOk();
        $response->assertViewIs('about.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\AboutController::class,
            'store',
            \App\Http\Requests\Admin\AboutStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title_uz = $this->faker->word;
        $title_en = $this->faker->word;
        $title_ru = $this->faker->word;
        $sub_content_uz = $this->faker->text;
        $sub_content_en = $this->faker->text;
        $sub_content_ru = $this->faker->text;
        $content_uz = $this->faker->text;
        $content_en = $this->faker->text;
        $content_ru = $this->faker->text;
        $image_url = $this->faker->word;
        $video_url = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->post(route('about.store'), [
            'title_uz' => $title_uz,
            'title_en' => $title_en,
            'title_ru' => $title_ru,
            'sub_content_uz' => $sub_content_uz,
            'sub_content_en' => $sub_content_en,
            'sub_content_ru' => $sub_content_ru,
            'content_uz' => $content_uz,
            'content_en' => $content_en,
            'content_ru' => $content_ru,
            'image_url' => $image_url,
            'video_url' => $video_url,
            'status' => $status,
        ]);

        $abouts = About::query()
            ->where('title_uz', $title_uz)
            ->where('title_en', $title_en)
            ->where('title_ru', $title_ru)
            ->where('sub_content_uz', $sub_content_uz)
            ->where('sub_content_en', $sub_content_en)
            ->where('sub_content_ru', $sub_content_ru)
            ->where('content_uz', $content_uz)
            ->where('content_en', $content_en)
            ->where('content_ru', $content_ru)
            ->where('image_url', $image_url)
            ->where('video_url', $video_url)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $abouts);
        $about = $abouts->first();

        $response->assertRedirect(route('about.index'));
        $response->assertSessionHas('about.id', $about->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $about = About::factory()->create();

        $response = $this->get(route('about.show', $about));

        $response->assertOk();
        $response->assertViewIs('about.show');
        $response->assertViewHas('about');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $about = About::factory()->create();

        $response = $this->get(route('about.edit', $about));

        $response->assertOk();
        $response->assertViewIs('about.edit');
        $response->assertViewHas('about');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\AboutController::class,
            'update',
            \App\Http\Requests\Admin\AboutUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $about = About::factory()->create();
        $title_uz = $this->faker->word;
        $title_en = $this->faker->word;
        $title_ru = $this->faker->word;
        $sub_content_uz = $this->faker->text;
        $sub_content_en = $this->faker->text;
        $sub_content_ru = $this->faker->text;
        $content_uz = $this->faker->text;
        $content_en = $this->faker->text;
        $content_ru = $this->faker->text;
        $image_url = $this->faker->word;
        $video_url = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->put(route('about.update', $about), [
            'title_uz' => $title_uz,
            'title_en' => $title_en,
            'title_ru' => $title_ru,
            'sub_content_uz' => $sub_content_uz,
            'sub_content_en' => $sub_content_en,
            'sub_content_ru' => $sub_content_ru,
            'content_uz' => $content_uz,
            'content_en' => $content_en,
            'content_ru' => $content_ru,
            'image_url' => $image_url,
            'video_url' => $video_url,
            'status' => $status,
        ]);

        $about->refresh();

        $response->assertRedirect(route('about.index'));
        $response->assertSessionHas('about.id', $about->id);

        $this->assertEquals($title_uz, $about->title_uz);
        $this->assertEquals($title_en, $about->title_en);
        $this->assertEquals($title_ru, $about->title_ru);
        $this->assertEquals($sub_content_uz, $about->sub_content_uz);
        $this->assertEquals($sub_content_en, $about->sub_content_en);
        $this->assertEquals($sub_content_ru, $about->sub_content_ru);
        $this->assertEquals($content_uz, $about->content_uz);
        $this->assertEquals($content_en, $about->content_en);
        $this->assertEquals($content_ru, $about->content_ru);
        $this->assertEquals($image_url, $about->image_url);
        $this->assertEquals($video_url, $about->video_url);
        $this->assertEquals($status, $about->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $about = About::factory()->create();

        $response = $this->delete(route('about.destroy', $about));

        $response->assertRedirect(route('about.index'));

        $this->assertModelMissing($about);
    }
}
