<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getCategories(): array {
        $categories = [];
        $faker = Factory::create();
        for($i=1; $i<10; $i++) {
            $categories[$i] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100),
                'created_at' => now('Europe/Moscow')
            ];
            return $categories;
        }
    }

    public function getNews(int $catId = null, int $id = null): array
    {
        $news = [];
        $faker = Factory::create();


        if($id) {
            return [
                'title' => $faker->jobTitle(),
                'category' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'status' => 'Draft',
                'description' => $faker->text(100),
                'created_at' => now('Europe/Moscow')
            ];
        }

        if ($catId) {
            $category = $faker->jobTitle();
            for($i=1; $i<10; $i++) {
                $news[$i] = [
                    'title' => $faker->jobTitle(),
                    'category' => $category,
                    'author' => $faker->userName(),
                    'status' => 'Draft',
                    'description' => $faker->text(100),
                    'created_at' => now('Europe/Moscow')
                ];
            }
            return $news;
        }

        for($i=1; $i<10; $i++) {
            $categories[$i] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100),
                'created_at' => now('Europe/Moscow')
            ];
        }
        return $categories;
    }
}
