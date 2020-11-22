<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            Product::create([
                'name' => 'Jacket-' . $i,
                'slug' => 'Jacket-' . $i,
                'details' => 'Great for layering or wearing alone, this smooth cotton T-shirt features a ribbed crewneck, straight hem, short sleeves, and a tag-free neck for everyday comfort ',
                'price' => '19.99',
                'image' => 'Jacket-' . $i . '.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            Product::create([
                'name' => 'Shoes-' . $i,
                'slug' => 'Shoes-' . $i,
                'details' => 'Great for layering or wearing alone, this smooth cotton T-shirt features a ribbed crewneck, straight hem, short sleeves, and a tag-free neck for everyday comfort ',
                'price' => '24.99',
                'image' => 'Shoes-' . $i . '.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ]);
        }
        for ($i = 1; $i <= 3; $i++) {
            Product::create([
                'name' => 'T-shirt-' . $i,
                'slug' => 'T-shirt-' . $i,
                'details' => 'Great for layering or wearing alone, this smooth cotton T-shirt features a ribbed crewneck, straight hem, short sleeves, and a tag-free neck for everyday comfort ',
                'price' => '10.99',
                'image' => 'T-shirt-' . $i . '.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            Product::create([
                'name' => 'Pant-' . $i,
                'slug' => 'Pant-' . $i,
                'details' => 'Great for layering or wearing alone, this smooth cotton T-shirt features a ribbed crewneck, straight hem, short sleeves, and a tag-free neck for everyday comfort ',
                'price' => '14.99',
                'image' => 'Pant-' . $i . '.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ]);
        }


    }
}
