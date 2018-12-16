<?php

use Illuminate\Database\Seeder;
use App\ProductImage;

class ProductsImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //model factories
        factory(ProductImage::class, 100)->create();
    }
}
