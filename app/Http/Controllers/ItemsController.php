<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Items;

class ItemsController extends Controller
{
    protected $category;
    protected $items;

    public function __construct(Category $category, Items $items)
    {
        $this->category = $category;
        $this->items = $items;
    }

    public function getCreatePage()
    {
        $categories = $this->category->all();
        return view('create', ['categories' => $categories]);
    }

    public function createItem(ItemRequest $request)
    {
        $fileName = $this->handleFileUpload($request);

        $this->items->create([
            'item_name' => $request->item_name,
            'description' => $request->description,
            'finders_name' => $request->finder_name,
            'image' => $fileName,
            'category_id' => $request->category_id,
        ]);
        return redirect(route('getItems'));
    }

    public function getItem()
    {
        return $this->getItemView();
    }

    public function getItemForUser()
    {
        return $this->getItemView();
    }

    private function getItemView()
    {
        $items = $this->items->with('category')->get();
        $categories = $this->category->with('item')->get();

        return view('view', compact('items', 'categories'));
    }

    public function getItemById($id)
    {
        $items = $this->items->find($id);
        return view('update', ['items' => $items]);
    }

    public function updateItem(ItemRequest $request, $id)
    {
        $items = $this->items->find($id);
        $fileName = $this->handleFileUpload($request);

        $items->update([
            'item_name' => $request->item_name,
            'description' => $request->description,
            'finders_name' => $request->finder_name,
            'image' => $fileName,
        ]);

        return redirect(route('getItem'));
    }

    public function createCategory(Request $request)
    {
        $this->category->create([
            'category_name' => $request->category_name,
        ]);

        return redirect(route('getCreatePage'));
    }

    public function deleteItem($id)
    {
        $this->items->destroy($id);
        return redirect(route('getItem'));
    }

    public function apiGetItem()
    {
        $items = $this->items->with('category')->get();
        $categories = $this->category->with('item')->get();

        return response()->json(['items' => $items, 'categories' => $categories]);
    }

    public function apiCreateCategory(Request $request)
    {
        $this->category->create([
            'category_name' => $request->category_name,
        ]);

        return response()->json(['message' => 'Success Create']);
    }

    public function apiUpdateCategory(Request $request, $id)
    {
        $category = $this->category->find($id);
        $category->update([
            'category_name' => $request->category_name,
        ]);

        return response()->json(['message' => 'Success Update']);
    }

    public function apiDeleteCategory($id)
    {
        $this->category->destroy($id);
        return response()->json(['message' => 'Success Delete']);
    }

    private function handleFileUpload($request)
    {
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $request->item_name . '.' . $extension;
            $request->file('image')->storeAs('public/image/', $fileName);
            return $fileName;
        }
        return null;
    }
}
