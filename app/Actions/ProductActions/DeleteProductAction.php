<?php
namespace App\Actions\ProductActions;

use App\Repositories\ProductRepository;
use App\Models\Product;

class DeleteProductAction{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {   
        $this->productRepository = $productRepository;
    }

    public function execute(Product $product){
        return $this->productRepository->delete($product);
    }
}
?>