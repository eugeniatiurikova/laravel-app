<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait
{

    public function getCategories(): array {
        $categories = [];
        for($i=0; $i<10; $i++) {
            $categories[] = [
                'title' => fake()->jobTitle(),
                'description' => fake()->text(100),
                'created_at' => now('Europe/Moscow')
            ];
        }
        return $categories;
    }

    public function getNews(int $id = null, int $catId = null):array
    {
        $news = [];

        $getCurrentNews = static function(bool $long, int $id):array {
            if($long) $tmptxt = fake()->realTextBetween(400,600);
                else $tmptxt = fake()->text(100);
            return [
                'id' => $id,
                'title' => fake()->jobTitle(),
                'category' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'status' => 'Draft',
                'description' => $tmptxt,
                'image' => fake()->imageUrl(),
                'created_at' => now('Europe/Moscow'),
            ];
        };

        if ($id === null) {
            for($i=0; $i<10; $i++) {
                $news[] = $getCurrentNews(false,$i+1);
            }
            return $news;
        }
        return $getCurrentNews(true, $id);
    }
}
