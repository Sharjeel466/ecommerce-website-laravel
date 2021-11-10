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
            'description' => 'Lorem Ipsum is simply dummy',
            'image' => 'a.jpg',
            'category_id' => $category->id,
        ]);

        $product = Product::create([
            'name' => 'Green Shirt',
            'price' => '200',
            'description' => 'Lorem Ipsum is simply dummy',
            'image' => 'b.png',
            'category_id' => $category->id,
        ]);

        $product = Product::create([
            'name' => 'Black Shirt',
            'price' => '50',
            'description' => 'Lorem Ipsum is simply dummy',
            'image' => 'c.png',
            'category_id' => $category->id,
        ]);

        $product = Product::create([
            'name' => 'blue Shirt',
            'price' => '600',
            'description' => 'Lorem Ipsum is simply dummy',
            'image' => 'd.png',
            'category_id' => $category->id,
        ]);

    }
}
