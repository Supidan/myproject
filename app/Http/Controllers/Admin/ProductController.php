<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Requests\ProductPost;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
	
	private $data	= array(
		
		"folder" => "product"
	);
	
    public function index(){
		
		$productData	= Product::get();
		
		$this->data["data"]	= $productData;
		
		return view('admin.product.view', $this->data);
	}
	
	public function add($id = ""){
		
		if(empty($id)){
			
			$act	= "add";
		}else{
			
			$act	= "edit";
		}
		
		if($id){
			
			$productDataRow	= Product::where('id', $id)->first();
			
			session()->flash('txtName', $productDataRow->product_name);
			session()->flash('txtStock', $productDataRow->stock);
		}
		
		$this->data["id"]		= $id;
		$this->data["action"]	= $act;
		
		return view('admin.product.add', $this->data);
	}
	
	public function process(ProductPost $request){
		
		$validatedData = $request->validated();
		
        $data 			=  new Product();
		
		if(!empty($request->txtID)){
			
			$data->where('id', $request->id)->update([
				"product_name"	=> $request->txtName,
				"stock"			=> $request->txtStock
			]);
		}else{
			
			$data->product_name	= $request->txtName;
        	$data->stock 		= $request->txtStock;
        	$data->save();
		}
		
		if(empty($data->id)){
			
			$id	= $request->txtID;
		}else{
			
			$id	= $data->id;
		}

        return redirect('admin/product/edit/'.$id)->with('alert-success','Product berhasil diproses');
	}
	
	public function delete($id){
		
		$productMod	= new Product();
		$productMod->where("id", $id)->delete();
		
		return redirect('admin/product/')->with('alert-success','Product berhasil dihapus');
	}
}