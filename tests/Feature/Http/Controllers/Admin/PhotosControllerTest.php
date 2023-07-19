<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Photo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\PhotosController
 */
class PhotosControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $photos = Photos::factory()->count(3)->create();

        $response = $this->get(route('photo.index'));

        $response->assertOk();
        $response->assertViewIs('photo.index');
        $response->assertViewHas('photos');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('photo.create'));

        $response->assertOk();
        $response->assertViewIs('photo.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\PhotosController::class,
            'store',
            \App\Http\Requests\Admin\PhotosStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('photo.store'));

        $response->assertRedirect(route('photo.index'));
        $response->assertSessionHas('photo.id', $photo->id);

        $this->assertDatabaseHas(photos, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $photo = Photos::factory()->create();

        $response = $this->get(route('photo.show', $photo));

        $response->assertOk();
        $response->assertViewIs('photo.show');
        $response->assertViewHas('photo');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $photo = Photos::factory()->create();

        $response = $this->get(route('photo.edit', $photo));

        $response->assertOk();
        $response->assertViewIs('photo.edit');
        $response->assertViewHas('photo');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\PhotosController::class,
            'update',
            \App\Http\Requests\Admin\PhotosUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $photo = Photos::factory()->create();

        $response = $this->put(route('photo.update', $photo));

        $photo->refresh();

        $response->assertRedirect(route('photo.index'));
        $response->assertSessionHas('photo.id', $photo->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $photo = Photos::factory()->create();
        $photo = Photo::factory()->create();

        $response = $this->delete(route('photo.destroy', $photo));

        $response->assertRedirect(route('photo.index'));

        $this->assertModelMissing($photo);
    }
}
