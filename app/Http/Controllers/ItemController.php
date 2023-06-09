<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create () {
        return view("inventroy.create");
    }

    public function index () {
        return view("inventroy.index",[
            "items" => Item::all()
        ]);
    }

    public function show ($id) {

        // $item = Item::find($id);
        // dd($item);

        return view("inventroy.show",["item" => Item::findOrFail($id)]);
        // return view("inventroy.show",compact("item"));
    }

    public function edit ($id)
    {
        return view("inventroy.edit",["item" =>Item::findOrFail($id)]);
    }

    public function update (Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->update();

        return redirect()->route("item.index");
    }

    public function store (Request $request) {

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->save();

        // $item = Item::create([
        //     "name" => $request->name,
        //     "price" => $request->price,
        //     "stock" => $request->stock,
        // ]);

        return redirect()->route("item.index");
    }

    public function destroy ($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
