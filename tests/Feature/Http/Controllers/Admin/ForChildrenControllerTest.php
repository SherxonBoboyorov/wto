<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\ForChild;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\ForChildrenController
 */
class ForChildrenControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $forChildren = ForChildren::factory()->count(3)->create();

        $response = $this->get(route('for-child.index'));

        $response->assertOk();
        $response->assertViewIs('forChild.index');
        $response->assertViewHas('forChildren');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('for-child.create'));

        $response->assertOk();
        $response->assertViewIs('forChild.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ForChildrenController::class,
            'store',
            \App\Http\Requests\Admin\ForChildrenStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('for-child.store'));

        $response->assertRedirect(route('forChild.index'));
        $response->assertSessionHas('forChild.id', $forChild->id);

        $this->assertDatabaseHas(forChildren, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $forChild = ForChildren::factory()->create();

        $response = $this->get(route('for-child.show', $forChild));

        $response->assertOk();
        $response->assertViewIs('forChild.show');
        $response->assertViewHas('forChild');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $forChild = ForChildren::factory()->create();

        $response = $this->get(route('for-child.edit', $forChild));

        $response->assertOk();
        $response->assertViewIs('forChild.edit');
        $response->assertViewHas('forChild');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\ForChildrenController::class,
            'update',
            \App\Http\Requests\Admin\ForChildrenUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $forChild = ForChildren::factory()->create();

        $response = $this->put(route('for-child.update', $forChild));

        $forChild->refresh();

        $response->assertRedirect(route('forChild.index'));
        $response->assertSessionHas('forChild.id', $forChild->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $forChild = ForChildren::factory()->create();
        $forChild = ForChild::factory()->create();

        $response = $this->delete(route('for-child.destroy', $forChild));

        $response->assertRedirect(route('forChild.index'));

        $this->assertModelMissing($forChild);
    }
}
