<?php
namespace App\Actions\ProductActions;

use App\Repositories\ProductRepository;
use App\Models\Product;

class UpdateProductAction{
    
    protected $productRepository;
    
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;     
    }

    public function execute(Product $product, array $data){
        return $this->productRepository->update($product, $data);
    }
}
?>