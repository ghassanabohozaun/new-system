<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => ['en' => 'Category 1', 'ar' => 'القسم 1 '], 'slug' => ['en' => slug('Category 1'), 'ar' => slug('القسم 1 ')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ['name' => ['en' => 'Category 2', 'ar' => 'القسم 2 '], 'slug' => ['en' => slug('Category 2'), 'ar' => slug('القسم 2 ')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ['name' => ['en' => 'Category 3', 'ar' => 'القسم 3 '], 'slug' => ['en' => slug('Category 3'), 'ar' => slug('القسم 3 ')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ['name' => ['en' => 'Category 4', 'ar' => 'القسم 4 '], 'slug' => ['en' => slug('Category 4'), 'ar' => slug('القسم 4 ')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ['name' => ['en' => 'Category 5', 'ar' => 'القسم 5 '], 'slug' => ['en' => slug('Category 5'), 'ar' => slug('القسم 5 ')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ];

        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
