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
            ['name' => ['en' => 'domestic tourism', 'ar' => 'السياحة الداخلية'], 'slug' => ['en' => slug('domestic tourism'), 'ar' => slug('السياحة الداخلية')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ['name' => ['en' => 'foreign tourism', 'ar' => 'السياحة الخارجية'], 'slug' => ['en' => slug('foreign tourism'), 'ar' => slug('السياحة الخارجية')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ['name' => ['en' => 'Hajj and Umrah', 'ar' => 'الحج والعمرة'], 'slug' => ['en' => slug('Hajj and Umrah'), 'ar' => slug('الحج والعمرة')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ['name' => ['en' => 'Jeddah Tours', 'ar' => 'جدة تورز'], 'slug' => ['en' => slug('Jeddah Tours'), 'ar' => slug('جدة تورز')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ['name' => ['en' => 'honeymoon', 'ar' => 'شهر العسل'], 'slug' => ['en' => slug('honeymoon'), 'ar' => slug('شهر العسل')], 'status' => 1, 'parent' => null, 'icon' => ''],
            ];

        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
