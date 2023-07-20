<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ActivityController
 */
class ActivityControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $activities = Activity::factory()->count(3)->create();

        $response = $this->get(route('activity.index'));

        $response->assertOk();
        $response->assertViewIs('activity.index');
        $response->assertViewHas('activities');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('activity.create'));

        $response->assertOk();
        $response->assertViewIs('activity.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ActivityController::class,
            'store',
            \App\Http\Requests\Admin\ActivityStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('activity.store'));

        $response->assertRedirect(route('activity.index'));
        $response->assertSessionHas('activity.id', $activity->id);

        $this->assertDatabaseHas(activities, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $activity = Activity::factory()->create();

        $response = $this->get(route('activity.show', $activity));

        $response->assertOk();
        $response->assertViewIs('activity.show');
        $response->assertViewHas('activity');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $activity = Activity::factory()->create();

        $response = $this->get(route('activity.edit', $activity));

        $response->assertOk();
        $response->assertViewIs('activity.edit');
        $response->assertViewHas('activity');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ActivityController::class,
            'update',
            \App\Http\Requests\Admin\ActivityUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $activity = Activity::factory()->create();

        $response = $this->put(route('activity.update', $activity));

        $activity->refresh();

        $response->assertRedirect(route('activity.index'));
        $response->assertSessionHas('activity.id', $activity->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $activity = Activity::factory()->create();

        $response = $this->delete(route('activity.destroy', $activity));

        $response->assertRedirect(route('activity.index'));

        $this->assertModelMissing($activity);
    }
}
