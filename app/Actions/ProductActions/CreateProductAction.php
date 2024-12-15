<?php
namespace App\Actions\ProductActions;

use App\Repositories\ProductRepository;
use App\Models\Product;
class CreateProductAction{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    public function execute(array $data){
        return $this->productRepository->create($data);
    }
}
?>