<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = [
          'name' => fake()->name(),
          'body' => fake()->text
        ];
        for ($i = 1; $i <= 10; $i++) {
            Post::query()->create($post);
        }
    }
}
