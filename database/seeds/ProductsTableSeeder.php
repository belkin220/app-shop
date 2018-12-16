<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //En este ejemplo, adjuntaremos una relación a algunos modelos creados. Cuando se usa el  create método para crear múltiples modelos, se devuelve una instancia de colección Eloquent , lo que le permite usar cualquiera de las funciones convenientes proporcionadas por la colección, tales como each://
        //// Creamos los productos
        $categories=factory(App\Category::class, 4)->create();
        // Por cada categoria, insertamos 10 productos que van a estar relacionados con cada categoria
        $categories->each(function($category) {
        // Creamos productos
        $products=factory(Product::class, 5)->make();
        // Guardamos (saveMany) en la DB estas relaciones
        $category->products()->saveMany($products);
        // El mismo procedimiento para relacionar productos con imágenes
        $products->each(function($product_image){
            $images= factory(ProductImage::class, 2)->make();
            $product_image->images()->saveMany($images);
        });
    });
    }
}

