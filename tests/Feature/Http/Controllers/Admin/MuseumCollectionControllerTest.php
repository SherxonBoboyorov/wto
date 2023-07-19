<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\MuseumCollection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\MuseumCollectionController
 */
class MuseumCollectionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $museumCollections = MuseumCollection::factory()->count(3)->create();

        $response = $this->get(route('museum-collection.index'));

        $response->assertOk();
        $response->assertViewIs('museumCollection.index');
        $response->assertViewHas('museumCollections');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('museum-collection.create'));

        $response->assertOk();
        $response->assertViewIs('museumCollection.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\MuseumCollectionController::class,
            'store',
            \App\Http\Requests\Admin\MuseumCollectionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('museum-collection.store'));

        $response->assertRedirect(route('museumCollection.index'));
        $response->assertSessionHas('museumCollection.id', $museumCollection->id);

        $this->assertDatabaseHas(museumCollections, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $museumCollection = MuseumCollection::factory()->create();

        $response = $this->get(route('museum-collection.show', $museumCollection));

        $response->assertOk();
        $response->assertViewIs('museumCollection.show');
        $response->assertViewHas('museumCollection');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $museumCollection = MuseumCollection::factory()->create();

        $response = $this->get(route('museum-collection.edit', $museumCollection));

        $response->assertOk();
        $response->assertViewIs('museumCollection.edit');
        $response->assertViewHas('museumCollection');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\MuseumCollectionController::class,
            'update',
            \App\Http\Requests\Admin\MuseumCollectionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $museumCollection = MuseumCollection::factory()->create();

        $response = $this->put(route('museum-collection.update', $museumCollection));

        $museumCollection->refresh();

        $response->assertRedirect(route('museumCollection.index'));
        $response->assertSessionHas('museumCollection.id', $museumCollection->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $museumCollection = MuseumCollection::factory()->create();

        $response = $this->delete(route('museum-collection.destroy', $museumCollection));

        $response->assertRedirect(route('museumCollection.index'));

        $this->assertModelMissing($museumCollection);
    }
}
