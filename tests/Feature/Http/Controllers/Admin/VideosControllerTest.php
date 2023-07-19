<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\VideosController
 */
class VideosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $videos = Videos::factory()->count(3)->create();

        $response = $this->get(route('video.index'));

        $response->assertOk();
        $response->assertViewIs('video.index');
        $response->assertViewHas('videos');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('video.create'));

        $response->assertOk();
        $response->assertViewIs('video.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\VideosController::class,
            'store',
            \App\Http\Requests\Admin\VideosStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('video.store'));

        $response->assertRedirect(route('video.index'));
        $response->assertSessionHas('video.id', $video->id);

        $this->assertDatabaseHas(videos, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $video = Videos::factory()->create();

        $response = $this->get(route('video.show', $video));

        $response->assertOk();
        $response->assertViewIs('video.show');
        $response->assertViewHas('video');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $video = Videos::factory()->create();

        $response = $this->get(route('video.edit', $video));

        $response->assertOk();
        $response->assertViewIs('video.edit');
        $response->assertViewHas('video');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\VideosController::class,
            'update',
            \App\Http\Requests\Admin\VideosUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $video = Videos::factory()->create();

        $response = $this->put(route('video.update', $video));

        $video->refresh();

        $response->assertRedirect(route('video.index'));
        $response->assertSessionHas('video.id', $video->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $video = Videos::factory()->create();
        $video = Video::factory()->create();

        $response = $this->delete(route('video.destroy', $video));

        $response->assertRedirect(route('video.index'));

        $this->assertModelMissing($video);
    }
}
