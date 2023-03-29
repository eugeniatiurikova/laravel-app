<?php

namespace Database\Seeders;

use App\Enums\News\StatusEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array {
        $data = [];
        $arr = StatusEnum::getValues();
        for($i=0; $i<100; $i++) {
            $data[] = [
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'image' => fake()->imageUrl(),
                'description' => fake()->text(100),
                'status' => $arr[array_rand($arr)],
                'isVisible' => rand(0,1),
                'created_at' => now()->timezone('Europe/Moscow'),
                'updated_at' => now()->timezone('Europe/Moscow')
            ];
        }
        return $data;
    }
}
