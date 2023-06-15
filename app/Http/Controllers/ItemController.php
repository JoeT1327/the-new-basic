<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    //     $items = Item::when(true,function($query){
    //         $query->where("id",10);
    //     })->get();

    //    return $items;

        $items = Item::when(request()->has("keyword"),function($query){
            $keyword = request()->keyword;
            $query->where("name","like","%".$keyword."%");
            $query->orWhere("price","like","%".$keyword."%");
            $query->orWhere("stock","like","%".$keyword."%");

        })
        ->when(request()->has("name"),function($query){
            $sortType = request()->name ?? "asc";
            $query->orderBy("name",$sortType);
        })
        ->paginate(5)->withQueryString();

        //withQueryString က pagination တစ်ခုနဲ့တစ်ခုအပြောင်းအလဲမှာ keyword ပါသွားအောင်လုပ်တဲ့ laravel က provide ထားတဲ့ method


        return view("inventroy.index", compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("inventroy.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->save();
        return redirect()->route("item.index")->with("status", "New item has been already added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view("inventroy.show",compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view("inventroy.edit",compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->update();

        return redirect()->route("item.index")->with("status", "An item has already been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->with("status", "An item has already been deleted");
    }
}
