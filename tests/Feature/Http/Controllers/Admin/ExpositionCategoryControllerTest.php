<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\ExpositionCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ExpositionCategoryController
 */
class ExpositionCategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $expositionCategories = ExpositionCategory::factory()->count(3)->create();

        $response = $this->get(route('exposition-category.index'));

        $response->assertOk();
        $response->assertViewIs('expositionCategory.index');
        $response->assertViewHas('expositionCategories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('exposition-category.create'));

        $response->assertOk();
        $response->assertViewIs('expositionCategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ExpositionCategoryController::class,
            'store',
            \App\Http\Requests\Admin\ExpositionCategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('exposition-category.store'));

        $response->assertRedirect(route('expositionCategory.index'));
        $response->assertSessionHas('expositionCategory.id', $expositionCategory->id);

        $this->assertDatabaseHas(expositionCategories, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $expositionCategory = ExpositionCategory::factory()->create();

        $response = $this->get(route('exposition-category.show', $expositionCategory));

        $response->assertOk();
        $response->assertViewIs('expositionCategory.show');
        $response->assertViewHas('expositionCategory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $expositionCategory = ExpositionCategory::factory()->create();

        $response = $this->get(route('exposition-category.edit', $expositionCategory));

        $response->assertOk();
        $response->assertViewIs('expositionCategory.edit');
        $response->assertViewHas('expositionCategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ExpositionCategoryController::class,
            'update',
            \App\Http\Requests\Admin\ExpositionCategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $expositionCategory = ExpositionCategory::factory()->create();

        $response = $this->put(route('exposition-category.update', $expositionCategory));

        $expositionCategory->refresh();

        $response->assertRedirect(route('expositionCategory.index'));
        $response->assertSessionHas('expositionCategory.id', $expositionCategory->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $expositionCategory = ExpositionCategory::factory()->create();

        $response = $this->delete(route('exposition-category.destroy', $expositionCategory));

        $response->assertRedirect(route('expositionCategory.index'));

        $this->assertModelMissing($expositionCategory);
    }
}
