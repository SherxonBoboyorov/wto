<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\UsefullLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\UsefullLinksController
 */
class UsefullLinksControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $usefullLinks = UsefullLinks::factory()->count(3)->create();

        $response = $this->get(route('usefull-link.index'));

        $response->assertOk();
        $response->assertViewIs('usefullLink.index');
        $response->assertViewHas('usefullLinks');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('usefull-link.create'));

        $response->assertOk();
        $response->assertViewIs('usefullLink.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\UsefullLinksController::class,
            'store',
            \App\Http\Requests\Admin\UsefullLinksStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('usefull-link.store'));

        $response->assertRedirect(route('usefullLink.index'));
        $response->assertSessionHas('usefullLink.id', $usefullLink->id);

        $this->assertDatabaseHas(usefullLinks, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $usefullLink = UsefullLinks::factory()->create();

        $response = $this->get(route('usefull-link.show', $usefullLink));

        $response->assertOk();
        $response->assertViewIs('usefullLink.show');
        $response->assertViewHas('usefullLink');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $usefullLink = UsefullLinks::factory()->create();

        $response = $this->get(route('usefull-link.edit', $usefullLink));

        $response->assertOk();
        $response->assertViewIs('usefullLink.edit');
        $response->assertViewHas('usefullLink');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\UsefullLinksController::class,
            'update',
            \App\Http\Requests\Admin\UsefullLinksUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $usefullLink = UsefullLinks::factory()->create();

        $response = $this->put(route('usefull-link.update', $usefullLink));

        $usefullLink->refresh();

        $response->assertRedirect(route('usefullLink.index'));
        $response->assertSessionHas('usefullLink.id', $usefullLink->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $usefullLink = UsefullLinks::factory()->create();
        $usefullLink = UsefullLink::factory()->create();

        $response = $this->delete(route('usefull-link.destroy', $usefullLink));

        $response->assertRedirect(route('usefullLink.index'));

        $this->assertModelMissing($usefullLink);
    }
}
