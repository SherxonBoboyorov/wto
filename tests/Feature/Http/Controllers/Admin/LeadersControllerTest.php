<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Leader;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\LeadersController
 */
class LeadersControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $leaders = Leaders::factory()->count(3)->create();

        $response = $this->get(route('leader.index'));

        $response->assertOk();
        $response->assertViewIs('leader.index');
        $response->assertViewHas('leaders');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('leader.create'));

        $response->assertOk();
        $response->assertViewIs('leader.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\LeadersController::class,
            'store',
            \App\Http\Requests\Admin\LeadersStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name_uz = $this->faker->word;
        $name_en = $this->faker->word;
        $name_ru = $this->faker->word;
        $position_uz = $this->faker->word;
        $position_en = $this->faker->word;
        $position_ru = $this->faker->word;
        $phone = $this->faker->phoneNumber;
        $reception_days_uz = $this->faker->word;
        $reception_days_en = $this->faker->word;
        $reception_days_ru = $this->faker->word;
        $email = $this->faker->safeEmail;
        $content_uz = $this->faker->text;
        $content_en = $this->faker->text;
        $content_ru = $this->faker->text;
        $order = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->boolean;

        $response = $this->post(route('leader.store'), [
            'name_uz' => $name_uz,
            'name_en' => $name_en,
            'name_ru' => $name_ru,
            'position_uz' => $position_uz,
            'position_en' => $position_en,
            'position_ru' => $position_ru,
            'phone' => $phone,
            'reception_days_uz' => $reception_days_uz,
            'reception_days_en' => $reception_days_en,
            'reception_days_ru' => $reception_days_ru,
            'email' => $email,
            'content_uz' => $content_uz,
            'content_en' => $content_en,
            'content_ru' => $content_ru,
            'order' => $order,
            'status' => $status,
        ]);

        $leaders = Leader::query()
            ->where('name_uz', $name_uz)
            ->where('name_en', $name_en)
            ->where('name_ru', $name_ru)
            ->where('position_uz', $position_uz)
            ->where('position_en', $position_en)
            ->where('position_ru', $position_ru)
            ->where('phone', $phone)
            ->where('reception_days_uz', $reception_days_uz)
            ->where('reception_days_en', $reception_days_en)
            ->where('reception_days_ru', $reception_days_ru)
            ->where('email', $email)
            ->where('content_uz', $content_uz)
            ->where('content_en', $content_en)
            ->where('content_ru', $content_ru)
            ->where('order', $order)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $leaders);
        $leader = $leaders->first();

        $response->assertRedirect(route('leader.index'));
        $response->assertSessionHas('leader.id', $leader->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $leader = Leaders::factory()->create();

        $response = $this->get(route('leader.show', $leader));

        $response->assertOk();
        $response->assertViewIs('leader.show');
        $response->assertViewHas('leader');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $leader = Leaders::factory()->create();

        $response = $this->get(route('leader.edit', $leader));

        $response->assertOk();
        $response->assertViewIs('leader.edit');
        $response->assertViewHas('leader');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\LeadersController::class,
            'update',
            \App\Http\Requests\Admin\LeadersUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $leader = Leaders::factory()->create();
        $name_uz = $this->faker->word;
        $name_en = $this->faker->word;
        $name_ru = $this->faker->word;
        $position_uz = $this->faker->word;
        $position_en = $this->faker->word;
        $position_ru = $this->faker->word;
        $phone = $this->faker->phoneNumber;
        $reception_days_uz = $this->faker->word;
        $reception_days_en = $this->faker->word;
        $reception_days_ru = $this->faker->word;
        $email = $this->faker->safeEmail;
        $content_uz = $this->faker->text;
        $content_en = $this->faker->text;
        $content_ru = $this->faker->text;
        $order = $this->faker->numberBetween(-10000, 10000);
        $status = $this->faker->boolean;

        $response = $this->put(route('leader.update', $leader), [
            'name_uz' => $name_uz,
            'name_en' => $name_en,
            'name_ru' => $name_ru,
            'position_uz' => $position_uz,
            'position_en' => $position_en,
            'position_ru' => $position_ru,
            'phone' => $phone,
            'reception_days_uz' => $reception_days_uz,
            'reception_days_en' => $reception_days_en,
            'reception_days_ru' => $reception_days_ru,
            'email' => $email,
            'content_uz' => $content_uz,
            'content_en' => $content_en,
            'content_ru' => $content_ru,
            'order' => $order,
            'status' => $status,
        ]);

        $leader->refresh();

        $response->assertRedirect(route('leader.index'));
        $response->assertSessionHas('leader.id', $leader->id);

        $this->assertEquals($name_uz, $leader->name_uz);
        $this->assertEquals($name_en, $leader->name_en);
        $this->assertEquals($name_ru, $leader->name_ru);
        $this->assertEquals($position_uz, $leader->position_uz);
        $this->assertEquals($position_en, $leader->position_en);
        $this->assertEquals($position_ru, $leader->position_ru);
        $this->assertEquals($phone, $leader->phone);
        $this->assertEquals($reception_days_uz, $leader->reception_days_uz);
        $this->assertEquals($reception_days_en, $leader->reception_days_en);
        $this->assertEquals($reception_days_ru, $leader->reception_days_ru);
        $this->assertEquals($email, $leader->email);
        $this->assertEquals($content_uz, $leader->content_uz);
        $this->assertEquals($content_en, $leader->content_en);
        $this->assertEquals($content_ru, $leader->content_ru);
        $this->assertEquals($order, $leader->order);
        $this->assertEquals($status, $leader->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $leader = Leaders::factory()->create();
        $leader = Leader::factory()->create();

        $response = $this->delete(route('leader.destroy', $leader));

        $response->assertRedirect(route('leader.index'));

        $this->assertModelMissing($leader);
    }
}
