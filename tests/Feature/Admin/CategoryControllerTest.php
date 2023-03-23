<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_categories_successful_page(): void
    {
        $response = $this->get(route('admin.categories.index'));
        $response->assertStatus(200);
    }

    public function test_categories_create_successful_page(): void
    {
        $response = $this->get(route('admin.categories.create'));
        $response->assertViewIs('admin.categories.create')
            ->assertStatus(200);
    }

    public function test_categories_create_return_json_page(): void
    {

        $data = [
            'title' => fake()->jobTitle(),
            'description' => fake()->text(100)
        ];
        $response = $this->post(route('admin.categories.store', $data ));
        $response->assertJson($data)
        ->assertStatus(200);
    }
}
