<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Actions\ProductActions\CreateProductAction;
use App\Actions\ProductActions\UpdateProductAction;
use App\Actions\ProductActions\DeleteProductAction;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    protected $createProductAction;
    protected $updateProductAction;
    protected $deleteProductAction;

    public function __construct(CreateProductAction $createProductAction , UpdateProductAction $updateProductAction, DeleteProductAction $deleteProductAction)
    {
        $this->createProductAction = $createProductAction;
        $this->updateProductAction = $updateProductAction;
        $this->deleteProductAction = $deleteProductAction;
    }

    // Hiển thị tất cả sản phẩm
    public function index(){
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Tạo mới sản phẩm
    public function store(ProductRequest $request){
        $product = $this->createProductAction->execute($request->validated());
        return redirect()->route('products.index');
    }

    // Cập nhật sản phẩm
    public function update(Product $product, ProductRequest $request){
        $this->updateProductAction->execute($product, $request->validated());
        return redirect()->route('products.index');
    }

    // Xóa sản phẩm
    public function destroy(Product $product){
        $this->deleteProductAction->execute($product);
        return redirect()->route('products.index');
    } 
}
