<?php

namespace App\Http\Controllers;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function getCreatePage()
    {
        $categories = Category::all();
        return view('pages.admin-found', ['categories' => $categories]);
    }

    public function createItem(Request $request)
    {
        dd($request->all());
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->item_name .'.'.$extension;
        $request->file('image')->storeAs('public/image/', $fileName);

        Items::create([
            'item_name' => $request->item_name,
            'description' => $request->description,
            'finders_name' => $request->finder_name,
            'image' => $fileName,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'found_location' => $request->found_location
        ]);
        return redirect(route('pages.admin-lost'))->with('success',
                                                'Entry created successfully.');
    }

    public function getItem()
    {
        $items = Items::with('category')->get();
        $categories = Category::with('items')->get();

        return view ('pages.admin-lost', compact('items', 'categories'));
    }

    public function getItemForUser()
    {
        $items = Items::with('category')->get();
        $categories = Category::with('items')->get();

        return view ('pages.lost', compact('items', 'categories'));
    }

    public function getItemById($id)
    {
        $items = Items::find($id);

        return view('update', ['Items' => $items]);
    }

    public function updateItem(ItemRequest $request, $id)
    {
        $items = Items::find($id);

        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->nama_Item .'.'.$extension;
        $request->file('image')->storeAs('public/image/', $fileName);

        $items -> update([
            'item_name' => $request->item_name,
            'description' => $request->description,
            'finders_name' => $request->finder_name,
            'image' => $fileName,
        ]);

        return redirect(route('getItem'));
    }

    public function createCategory(Request $request)
    {
        $categories = Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect(route('getCreatePage'));
    }

    public function deleteItem($id)
    {
        Items::destroy($id);

        return redirect(route('getItem'));
    }

    public function apiGetItem()
    {
        $items = Items::with('category')->get();
        $categories = Category::with('Item')->get();

        return $categories;
    }

    public function apiCreateCategory(Request $request)
    {
        $categories = Category::create([
            'category_name' => $request->category_name,
        ]);

        return 'Succes Create';
    }

    public function apiUpdateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        $category -> update([
            'category_name' => $request->category_name,
        ]);

        return 'Succes Update';
    }

    public function apiDeleteCategory($id)
    {
        Category::destroy($id);

        return 'Succes Delete';
    }

}
