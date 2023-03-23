<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function test_news_successful_page(): void
    {
        $response = $this->get(route('admin.news.index'));
        $response->assertStatus(200);
    }

    public function test_news_create_successful_page(): void
    {
        $response = $this->get(route('admin.news.create'));
        $response->assertViewIs('admin.news.create')
            ->assertStatus(200);
    }

    public function test_news_create_return_json_page(): void
    {
        $data = [
            'title' => fake()->jobTitle(),
            'author' => fake()->userName(),
            'category' => fake()->jobTitle(),
            'description' => fake()->text(100)
        ];
        $response = $this->post(route('admin.news.store', $data ));
        $response->assertJson($data)
            ->assertStatus(200);
    }
}
