<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\NewsController
 */
class NewsControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $news = News::factory()->count(3)->create();

        $response = $this->get(route('news.index'));

        $response->assertOk();
        $response->assertViewIs('news.index');
        $response->assertViewHas('news');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('news.create'));

        $response->assertOk();
        $response->assertViewIs('news.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\NewsController::class,
            'store',
            \App\Http\Requests\Admin\NewsStoreRequest::class
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
        $date_mask = $this->faker->dateTime();
        $image_url = $this->faker->word;
        $status = $this->faker->boolean;
        $order = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('news.store'), [
            'title_uz' => $title_uz,
            'title_en' => $title_en,
            'title_ru' => $title_ru,
            'sub_content_uz' => $sub_content_uz,
            'sub_content_en' => $sub_content_en,
            'sub_content_ru' => $sub_content_ru,
            'content_uz' => $content_uz,
            'content_en' => $content_en,
            'content_ru' => $content_ru,
            'date_mask' => $date_mask,
            'image_url' => $image_url,
            'status' => $status,
            'order' => $order,
        ]);

        $news = News::query()
            ->where('title_uz', $title_uz)
            ->where('title_en', $title_en)
            ->where('title_ru', $title_ru)
            ->where('sub_content_uz', $sub_content_uz)
            ->where('sub_content_en', $sub_content_en)
            ->where('sub_content_ru', $sub_content_ru)
            ->where('content_uz', $content_uz)
            ->where('content_en', $content_en)
            ->where('content_ru', $content_ru)
            ->where('date_mask', $date_mask)
            ->where('image_url', $image_url)
            ->where('status', $status)
            ->where('order', $order)
            ->get();
        $this->assertCount(1, $news);
        $news = $news->first();

        $response->assertRedirect(route('news.index'));
        $response->assertSessionHas('news.id', $news->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $news = News::factory()->create();

        $response = $this->get(route('news.show', $news));

        $response->assertOk();
        $response->assertViewIs('news.show');
        $response->assertViewHas('news');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $news = News::factory()->create();

        $response = $this->get(route('news.edit', $news));

        $response->assertOk();
        $response->assertViewIs('news.edit');
        $response->assertViewHas('news');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\NewsController::class,
            'update',
            \App\Http\Requests\Admin\NewsUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $news = News::factory()->create();
        $title_uz = $this->faker->word;
        $title_en = $this->faker->word;
        $title_ru = $this->faker->word;
        $sub_content_uz = $this->faker->text;
        $sub_content_en = $this->faker->text;
        $sub_content_ru = $this->faker->text;
        $content_uz = $this->faker->text;
        $content_en = $this->faker->text;
        $content_ru = $this->faker->text;
        $date_mask = $this->faker->dateTime();
        $image_url = $this->faker->word;
        $status = $this->faker->boolean;
        $order = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('news.update', $news), [
            'title_uz' => $title_uz,
            'title_en' => $title_en,
            'title_ru' => $title_ru,
            'sub_content_uz' => $sub_content_uz,
            'sub_content_en' => $sub_content_en,
            'sub_content_ru' => $sub_content_ru,
            'content_uz' => $content_uz,
            'content_en' => $content_en,
            'content_ru' => $content_ru,
            'date_mask' => $date_mask,
            'image_url' => $image_url,
            'status' => $status,
            'order' => $order,
        ]);

        $news->refresh();

        $response->assertRedirect(route('news.index'));
        $response->assertSessionHas('news.id', $news->id);

        $this->assertEquals($title_uz, $news->title_uz);
        $this->assertEquals($title_en, $news->title_en);
        $this->assertEquals($title_ru, $news->title_ru);
        $this->assertEquals($sub_content_uz, $news->sub_content_uz);
        $this->assertEquals($sub_content_en, $news->sub_content_en);
        $this->assertEquals($sub_content_ru, $news->sub_content_ru);
        $this->assertEquals($content_uz, $news->content_uz);
        $this->assertEquals($content_en, $news->content_en);
        $this->assertEquals($content_ru, $news->content_ru);
        $this->assertEquals($date_mask, $news->date_mask);
        $this->assertEquals($image_url, $news->image_url);
        $this->assertEquals($status, $news->status);
        $this->assertEquals($order, $news->order);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $news = News::factory()->create();

        $response = $this->delete(route('news.destroy', $news));

        $response->assertRedirect(route('news.index'));

        $this->assertModelMissing($news);
    }
}
