<?php


namespace App\DataObjects;

use App\Models\Product;

class ProductDto {

    /**
     * @var mixed
     */
    private $name;

    /**
     * @var mixed
     */
    private $description;

    /**
     * ProductDto constructor.
     * @param Product $product
     */
    public function __construct(Product $product) {
        $this->name = $product->name;
        $this->description = $product->description;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
}