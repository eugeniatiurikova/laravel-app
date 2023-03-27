<?php

namespace Database\Seeders;

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
        for($j = 1; $j <= 10; $j++) {
            for ($i = 1; $i <= 10; $i++) {
                $data[] = [
                    'category_id' => $j,
                    'news_id' => (($j - 1) * 10 ) + $i
                ];
            }
        }
        return $data;
    }
}
