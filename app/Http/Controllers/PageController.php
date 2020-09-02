<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Item;

class PageController extends Controller
{
    public function homefun($value='')
    {
        // $route = Route::current();
        // //dd($route);
        $categories=Category::all();
         $subcategories=Subcategory::all();
         $items=Item::all(); 
    	return view('frontend.home',compact('categories','subcategories','items'));
    }
    public function brandfun($value='')
    {
    	return view('frontend.brand');
    }
    public function itemdetailfun($value='')
    {
    	return view('frontend.itemdetail');
    }
    public function loginfun($value='')
    {
        $categories=Category::all();
         $subcategories=Subcategory::all();
         //$items=Item::all(); 
        return view('frontend.home',compact('categories','subcategories','items'));
    }
     public function promotionfun($value='')
    {
        return view('frontend.promotion');
    }
     public function registerfun($value='')
    {
        return view('frontend.register');
    }
     public function shoppingcartfun($value='')
    {
        $categories=Category::all();
         $subcategories=Subcategory::all();
         $items=Item::all(); 
        return view('frontend.shoppingcart',compact('categories','subcategories','items'));
    }
    public function subcategoryfun($value='')
    {
        return view('frontend.subcategory');
    }

    
    

     
    
    // public function testingfun($id,$name)
    // {
    //     return $id.'/'.$name;
    //    return view('testing');
    // }
}
