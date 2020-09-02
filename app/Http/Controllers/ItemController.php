<?php

namespace App\Http\Controllers;

use App\Item;
use App\Brand;
use App\Subcategory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =Item::all();
        //dd($items);
       return view('backend.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //return "Item create form here";
         $brands =Brand::all();
        $subcategories =Subcategory::all();
        return view('backend.items.create',compact('brands','subcategories'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //Validation
        $request->validate([
            "codeno"=>'required|min:4',
            "name"=>'required',
            "price"=>'required',
            "discount"=>'required', 
            "description"=>'required',
            "photo"=>'required',
            "subcategory"=>'required',
            "brand"=>'required'
        ]);
        //If include file ,upload file
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backend/itemimg'),$imageName);
        $path='backend/itemimg/'.$imageName;
        //Data insert
        $item=new Item;
        $item->codeno=$request->codeno;
        $item->name=$request->name;
        $item->photo=$path;
        $item->price=$request->price;
        $item->discount=$request->discount;
        $item->description=$request->description;
        $item->subcategory_id=$request->subcategory;
        $item->brand_id=$request->brand;
        $item->save();
        //redirect
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
          $brands =Brand::all();
        $subcategories =Subcategory::all();
        return view('backend.items.edit',compact('brands','subcategories','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
       //dd()

        //validation
        $request->validate([
            "codeno"=>'required|min:4',
            "name"=>'required',
            "price"=>'required',
            "discount"=>'required', 
            "description"=>'required',
            "photo"=>'sometimes',
            "oldphoto"=>'required',
            "subcategory"=>'required',
            "brand"=>'required'
        ]);

        //file upload,if data
        if($request->hasFile('photo')){
             $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('backend/itemimg'),$imageName);
            $path='backend/itemimg/'.$imageName;
        }else{
            $path=$request->oldphoto;
        }

        //data update
        $item->codeno=$request->codeno;
        $item->name=$request->name;
        $item->photo=$path;
        $item->price=$request->price;
        $item->discount=$request->discount;
        $item->description=$request->description;
        $item->subcategory_id=$request->subcategory;
        $item->brand_id=$request->brand;
        $item->save();
         //redirect
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
