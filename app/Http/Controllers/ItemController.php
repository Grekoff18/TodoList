<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    public function index()
    {
        return Item::orderBy("created_at", "DESC")->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      $newItem = new Item();
      $newItem->name = $request->item["name"];
      $newItem->save();

      return $newItem;
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $existingItem = Item::find($id);

        if ($existingItem) {
          $existingItem->completed = $request->item["completed"] ? true : false;
          $existingItem->completed_at = $request->item["completed"] ? Carbon::now() : null;
          $existingItem->save();

          return $existingItem;
        }

        return "Item not found.";
    }


    public function destroy($id)
    {
        $currentItem = Item::find($id);

        if ($currentItem) {
          $currentItem->delete();
          return "Item was deleted";
        }

        return "Item not found";
    }
}
