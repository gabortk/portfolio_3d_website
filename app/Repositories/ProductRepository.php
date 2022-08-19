<?php

namespace App\Repositories;

use App\Models\Product;
use App\DataObjects\ProductDto;

class ProductRepository extends Repository{

    public function getProductById($id) {
        $productById = Product::find($id);
        if($productById) {
            return new ProductDto($productById);
        } else {
            return new Product();
        }

    }

}