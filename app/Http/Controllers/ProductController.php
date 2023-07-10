<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return "in ProductController";
    }


    /**
     * Extragerea produselor si livrarea acestora
     */
    public function getAllProduct(Request $request)
    {
   
       return Product::all();
    }

    public function getOneProduct($product_id )
    {
        return Product::where('id', $product_id)->get() ;
    }

    /**
     * 
     */
    public function search($category_id)
    {
        return Product::where('category_id', 'like', $category_id.'%')->get() ;
    }

}
