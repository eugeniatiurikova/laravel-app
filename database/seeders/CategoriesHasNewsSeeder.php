<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesHasNewsSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('categories_has_news')->insert($this->getData());
    }

    private function getData(): array {
        $data = [];
        for($j=0; $j<10; $j++) {
            for ($i = 0; $i < 10; $i++) {
                $data[] = [
                    'category_id' => $j + 1,
                    'news_id' => $i + 1
                ];
            }
        }
        return $data;
    }
}
