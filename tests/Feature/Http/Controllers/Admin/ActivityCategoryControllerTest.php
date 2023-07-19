<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\ActivityCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ActivityCategoryController
 */
class ActivityCategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $activityCategories = ActivityCategory::factory()->count(3)->create();

        $response = $this->get(route('activity-category.index'));

        $response->assertOk();
        $response->assertViewIs('activityCategory.index');
        $response->assertViewHas('activityCategories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('activity-category.create'));

        $response->assertOk();
        $response->assertViewIs('activityCategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ActivityCategoryController::class,
            'store',
            \App\Http\Requests\Admin\ActivityCategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('activity-category.store'));

        $response->assertRedirect(route('activityCategory.index'));
        $response->assertSessionHas('activityCategory.id', $activityCategory->id);

        $this->assertDatabaseHas(activityCategories, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $activityCategory = ActivityCategory::factory()->create();

        $response = $this->get(route('activity-category.show', $activityCategory));

        $response->assertOk();
        $response->assertViewIs('activityCategory.show');
        $response->assertViewHas('activityCategory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $activityCategory = ActivityCategory::factory()->create();

        $response = $this->get(route('activity-category.edit', $activityCategory));

        $response->assertOk();
        $response->assertViewIs('activityCategory.edit');
        $response->assertViewHas('activityCategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ActivityCategoryController::class,
            'update',
            \App\Http\Requests\Admin\ActivityCategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $activityCategory = ActivityCategory::factory()->create();

        $response = $this->put(route('activity-category.update', $activityCategory));

        $activityCategory->refresh();

        $response->assertRedirect(route('activityCategory.index'));
        $response->assertSessionHas('activityCategory.id', $activityCategory->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $activityCategory = ActivityCategory::factory()->create();

        $response = $this->delete(route('activity-category.destroy', $activityCategory));

        $response->assertRedirect(route('activityCategory.index'));

        $this->assertModelMissing($activityCategory);
    }
}
