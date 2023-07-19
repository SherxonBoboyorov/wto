<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\ForChildrenCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ForChildrenCategoryController
 */
class ForChildrenCategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $forChildrenCategories = ForChildrenCategory::factory()->count(3)->create();

        $response = $this->get(route('for-children-category.index'));

        $response->assertOk();
        $response->assertViewIs('forChildrenCategory.index');
        $response->assertViewHas('forChildrenCategories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('for-children-category.create'));

        $response->assertOk();
        $response->assertViewIs('forChildrenCategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ForChildrenCategoryController::class,
            'store',
            \App\Http\Requests\Admin\ForChildrenCategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('for-children-category.store'));

        $response->assertRedirect(route('forChildrenCategory.index'));
        $response->assertSessionHas('forChildrenCategory.id', $forChildrenCategory->id);

        $this->assertDatabaseHas(forChildrenCategories, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $forChildrenCategory = ForChildrenCategory::factory()->create();

        $response = $this->get(route('for-children-category.show', $forChildrenCategory));

        $response->assertOk();
        $response->assertViewIs('forChildrenCategory.show');
        $response->assertViewHas('forChildrenCategory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $forChildrenCategory = ForChildrenCategory::factory()->create();

        $response = $this->get(route('for-children-category.edit', $forChildrenCategory));

        $response->assertOk();
        $response->assertViewIs('forChildrenCategory.edit');
        $response->assertViewHas('forChildrenCategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ForChildrenCategoryController::class,
            'update',
            \App\Http\Requests\Admin\ForChildrenCategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $forChildrenCategory = ForChildrenCategory::factory()->create();

        $response = $this->put(route('for-children-category.update', $forChildrenCategory));

        $forChildrenCategory->refresh();

        $response->assertRedirect(route('forChildrenCategory.index'));
        $response->assertSessionHas('forChildrenCategory.id', $forChildrenCategory->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $forChildrenCategory = ForChildrenCategory::factory()->create();

        $response = $this->delete(route('for-children-category.destroy', $forChildrenCategory));

        $response->assertRedirect(route('forChildrenCategory.index'));

        $this->assertModelMissing($forChildrenCategory);
    }
}
