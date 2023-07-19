<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Exposition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ExpositionController
 */
class ExpositionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $expositions = Exposition::factory()->count(3)->create();

        $response = $this->get(route('exposition.index'));

        $response->assertOk();
        $response->assertViewIs('exposition.index');
        $response->assertViewHas('expositions');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('exposition.create'));

        $response->assertOk();
        $response->assertViewIs('exposition.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ExpositionController::class,
            'store',
            \App\Http\Requests\Admin\ExpositionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('exposition.store'));

        $response->assertRedirect(route('exposition.index'));
        $response->assertSessionHas('exposition.id', $exposition->id);

        $this->assertDatabaseHas(expositions, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $exposition = Exposition::factory()->create();

        $response = $this->get(route('exposition.show', $exposition));

        $response->assertOk();
        $response->assertViewIs('exposition.show');
        $response->assertViewHas('exposition');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $exposition = Exposition::factory()->create();

        $response = $this->get(route('exposition.edit', $exposition));

        $response->assertOk();
        $response->assertViewIs('exposition.edit');
        $response->assertViewHas('exposition');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ExpositionController::class,
            'update',
            \App\Http\Requests\Admin\ExpositionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $exposition = Exposition::factory()->create();

        $response = $this->put(route('exposition.update', $exposition));

        $exposition->refresh();

        $response->assertRedirect(route('exposition.index'));
        $response->assertSessionHas('exposition.id', $exposition->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $exposition = Exposition::factory()->create();

        $response = $this->delete(route('exposition.destroy', $exposition));

        $response->assertRedirect(route('exposition.index'));

        $this->assertModelMissing($exposition);
    }
}
