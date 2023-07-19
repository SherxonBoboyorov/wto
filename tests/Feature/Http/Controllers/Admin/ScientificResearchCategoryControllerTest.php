<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\ScientificResearchCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ScientificResearchCategoryController
 */
class ScientificResearchCategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $scientificResearchCategories = ScientificResearchCategory::factory()->count(3)->create();

        $response = $this->get(route('scientific-research-category.index'));

        $response->assertOk();
        $response->assertViewIs('scientificResearchCategory.index');
        $response->assertViewHas('scientificResearchCategories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('scientific-research-category.create'));

        $response->assertOk();
        $response->assertViewIs('scientificResearchCategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ScientificResearchCategoryController::class,
            'store',
            \App\Http\Requests\Admin\ScientificResearchCategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('scientific-research-category.store'));

        $response->assertRedirect(route('scientificResearchCategory.index'));
        $response->assertSessionHas('scientificResearchCategory.id', $scientificResearchCategory->id);

        $this->assertDatabaseHas(scientificResearchCategories, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $scientificResearchCategory = ScientificResearchCategory::factory()->create();

        $response = $this->get(route('scientific-research-category.show', $scientificResearchCategory));

        $response->assertOk();
        $response->assertViewIs('scientificResearchCategory.show');
        $response->assertViewHas('scientificResearchCategory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $scientificResearchCategory = ScientificResearchCategory::factory()->create();

        $response = $this->get(route('scientific-research-category.edit', $scientificResearchCategory));

        $response->assertOk();
        $response->assertViewIs('scientificResearchCategory.edit');
        $response->assertViewHas('scientificResearchCategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ScientificResearchCategoryController::class,
            'update',
            \App\Http\Requests\Admin\ScientificResearchCategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $scientificResearchCategory = ScientificResearchCategory::factory()->create();

        $response = $this->put(route('scientific-research-category.update', $scientificResearchCategory));

        $scientificResearchCategory->refresh();

        $response->assertRedirect(route('scientificResearchCategory.index'));
        $response->assertSessionHas('scientificResearchCategory.id', $scientificResearchCategory->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $scientificResearchCategory = ScientificResearchCategory::factory()->create();

        $response = $this->delete(route('scientific-research-category.destroy', $scientificResearchCategory));

        $response->assertRedirect(route('scientificResearchCategory.index'));

        $this->assertModelMissing($scientificResearchCategory);
    }
}
