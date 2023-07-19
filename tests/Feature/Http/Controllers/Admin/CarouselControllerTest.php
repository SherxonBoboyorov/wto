<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Carousel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\CarouselController
 */
class CarouselControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $carousels = Carousel::factory()->count(3)->create();

        $response = $this->get(route('carousel.index'));

        $response->assertOk();
        $response->assertViewIs('carousel.index');
        $response->assertViewHas('carousels');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('carousel.create'));

        $response->assertOk();
        $response->assertViewIs('carousel.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\CarouselController::class,
            'store',
            \App\Http\Requests\Admin\CarouselStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('carousel.store'));

        $response->assertRedirect(route('carousel.index'));
        $response->assertSessionHas('carousel.id', $carousel->id);

        $this->assertDatabaseHas(carousels, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $carousel = Carousel::factory()->create();

        $response = $this->get(route('carousel.show', $carousel));

        $response->assertOk();
        $response->assertViewIs('carousel.show');
        $response->assertViewHas('carousel');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $carousel = Carousel::factory()->create();

        $response = $this->get(route('carousel.edit', $carousel));

        $response->assertOk();
        $response->assertViewIs('carousel.edit');
        $response->assertViewHas('carousel');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\CarouselController::class,
            'update',
            \App\Http\Requests\Admin\CarouselUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $carousel = Carousel::factory()->create();

        $response = $this->put(route('carousel.update', $carousel));

        $carousel->refresh();

        $response->assertRedirect(route('carousel.index'));
        $response->assertSessionHas('carousel.id', $carousel->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $carousel = Carousel::factory()->create();

        $response = $this->delete(route('carousel.destroy', $carousel));

        $response->assertRedirect(route('carousel.index'));

        $this->assertModelMissing($carousel);
    }
}
