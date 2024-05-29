<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use ProductModel;
use App\Models\ProductModel;

class ProductController extends Controller
{
    public function index()
    {
        return view('product'); //tra ve trang product.blade.php
    }

    public function login()
    {
        $name = "Nguyen minh anh!";
        return view('login')->with('name',$name);
    }

    function getProducts(){
        $products = ProductModel::all();
        return view('admin/product/getProducts',['products'=>$products]);
    }

    function getProductsbyBand(Request $request){
        $band = $request -> input('selectBand');
        $products = ProductModel::where('band',$band)->get();
        return view('admin/product/getProductsByBand',['products' => $products]);
    }

    function editProduct($pid){
        $product = ProductModel::where('pid', $pid)->first();
        return view(('admin/product/updateProduct'),['product'=> $product]);
    }

    function updateProduct(Request $request ,$pid){
        $product = ProductModel::where("pid", $pid)->first();
        $product ->pid = $request->pid;
        $product ->pname = $request->pname;
        $product ->company = $request->company;
        $product ->band = $request->selectBand;
        $product ->year = $request->selectYear;
        if(isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK){
        $pimage = 'data:image/png;base64,'.base64_encode(file_get_contents($_FILES['imageFile']["tmp_name"]));
       
        
        }
        $product ->save();
        return redirect('updateProduct/'.$pid)->with("Note","Sua thanh cong!");
    }

    function deleteProduct($pid){
        $product = ProductModel::where("pid", $pid)->first();
        $product ->delete();
        $id = $pid;
        return redirect('getProducts')->with("Note","Xoa $id thanh cong!");
    }
}
