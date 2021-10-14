<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name' => 'T-Shirts',
        ]);

        $product = Product::create([
            'name' => 'Blue Shirt',
            'price' => '100',
            'image' => 'a.jpg',
            'category_id' => $category->id,
        ]);
    }
}
