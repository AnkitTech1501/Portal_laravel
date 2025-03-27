<?php

namespace Database\Seeders;

use App\Models\JobCategories;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    public function run()
    {
        // Insert sample job categories
        JobCategories::create([
            'category_name' => 'Software Engineer',
        ]);

        JobCategories::create([
            'category_name' => 'Web Developer',
        ]);

        JobCategories::create([
            'category_name' => 'Data Scientist',
        ]);

        JobCategories::create([
            'category_name' => 'Product Manager',
        ]);

        JobCategories::create([
            'category_name' => 'Designer',
        ]);

        JobCategories::create([
            'category_name' => 'Marketing Manager',
        ]);
    }
}
