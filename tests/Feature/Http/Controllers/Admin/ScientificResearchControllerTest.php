<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\ScientificResearch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ScientificResearchController
 */
class ScientificResearchControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $scientificResearches = ScientificResearch::factory()->count(3)->create();

        $response = $this->get(route('scientific-research.index'));

        $response->assertOk();
        $response->assertViewIs('scientificResearch.index');
        $response->assertViewHas('scientificResearches');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('scientific-research.create'));

        $response->assertOk();
        $response->assertViewIs('scientificResearch.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ScientificResearchController::class,
            'store',
            \App\Http\Requests\Admin\ScientificResearchStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('scientific-research.store'));

        $response->assertRedirect(route('scientificResearch.index'));
        $response->assertSessionHas('scientificResearch.id', $scientificResearch->id);

        $this->assertDatabaseHas(scientificResearches, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $scientificResearch = ScientificResearch::factory()->create();

        $response = $this->get(route('scientific-research.show', $scientificResearch));

        $response->assertOk();
        $response->assertViewIs('scientificResearch.show');
        $response->assertViewHas('scientificResearch');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $scientificResearch = ScientificResearch::factory()->create();

        $response = $this->get(route('scientific-research.edit', $scientificResearch));

        $response->assertOk();
        $response->assertViewIs('scientificResearch.edit');
        $response->assertViewHas('scientificResearch');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ScientificResearchController::class,
            'update',
            \App\Http\Requests\Admin\ScientificResearchUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $scientificResearch = ScientificResearch::factory()->create();

        $response = $this->put(route('scientific-research.update', $scientificResearch));

        $scientificResearch->refresh();

        $response->assertRedirect(route('scientificResearch.index'));
        $response->assertSessionHas('scientificResearch.id', $scientificResearch->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $scientificResearch = ScientificResearch::factory()->create();

        $response = $this->delete(route('scientific-research.destroy', $scientificResearch));

        $response->assertRedirect(route('scientificResearch.index'));

        $this->assertModelMissing($scientificResearch);
    }
}
