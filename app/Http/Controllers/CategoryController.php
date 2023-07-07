<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return "in CategoryController";
    }


    /**
     * Extragerea produselor si livrarea acestora
     */
    public function getAllCategory(Request $request)
    {
   
       return Category::all();
    }
}
