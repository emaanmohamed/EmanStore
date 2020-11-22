<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'T-shirts', 'slug' => 'T-shirt', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pants', 'slug' => 'Pants', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jackets', 'slug' => 'Jackets', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'shoes', 'slug' => 'shoes', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
