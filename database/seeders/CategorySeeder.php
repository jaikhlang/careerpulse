<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Jobs',
            'Scholarships',
            'Admissions',
            'Exams',
            'Results',
            'Admit Cards',
            'Answer Keys',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate([
                'slug' => Str::slug($category),
                'name' => $category,
                'display_name' => $category,
                'description' => "Latest updates on $category",
                'image' => null,   
            ]
            );
        }
    }
}
