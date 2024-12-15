<?php
namespace App\Repositories;

use App\Models\Product;
class ProductRepository{
    // Lấy tất cả sản phẩm 
    public function all(){
        return Product::all();
    }

    // Tạo mới sản phẩm
    public function create(array $data){
        return Product::create($data);
    }

    // Cập nhật sản phẩm
    public function update(Product $product, array $data){
        return $product->update($data);
    }

    // Xóa sản phẩm
    public function delete(Product $product){
        return $product->delete();
    }

    // Tìm kiếm sản phẩm theo id
    public function find($id){
        return Product::findOrFail($id);
    }
}
?>