<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for($i=0; $i<10; $i++) {
            $data[] = [
                'name' => fake()->firstName(). ' ' . fake()->lastName(),
                'email' => fake()->email(),
                'url' => fake()->url(),
                'description' => fake()->text(100),
                'created_at' => now()->timezone('Europe/Moscow'),
                'updated_at' => now()->timezone('Europe/Moscow')
            ];
        }
        return $data;
    }
}
