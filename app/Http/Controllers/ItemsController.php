<?php

namespace App\Http\Controllers;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ItemsController extends Controller
{
    public function getCreatePage()
    {
        $categories = Category::all();
        return view('pages.admin-found', ['categories' => $categories]);
    }

    public function createItem(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'finders_name' => 'required',
            'found_location' => 'required',
            'date' => 'required',
            'image' => 'required|image', // validasi untuk file gambar
        ]);

        // Simpan gambar (jika ada)
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->item_name .'.'.$extension;
        $request->file('image')->storeAs('public/images/', $fileName);

        // Simpan data ke dalam database
        Items::create([
            'item_name' => $request->item_name,
            'image' => $fileName,
            'description' => $request->description,
            'finders_name' => $request->finders_name,
            'found_location' => $request->found_location,
            'date' => $request->date,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('getItemAdmin')->with('success', 'Data berhasil disimpan');
    }


    public function getItem()
    {
        $items = Items::with('category')->get();
        $categories = Category::with('items')->get();

        return view ('pages.lost', compact('items', 'categories'));
    }

    public function getItemAdmin()
    {
        $items = Items::with('category')->get();
        $categories = Category::with('items')->get();

        return view ('pages.admin-lost', compact('items', 'categories'));
    }

    public function getClaimant($id)
    {
        $item = Items::findOrFail($id);
        return view('pages.form-claim', ['item'=>$item]);
    }

    public function claimItem($id)
    {
        $item = Items::findOrFail($id);
        $item->status = 'claimed';
        $item->save();

        return redirect()->route('getItemAdmin')->with('success', 'Item claimed successfully');
    }

    public function getItemForUser()
    {
        $items = Items::with('category')->get();
        $categories = Category::with('Item')->get();

        return view ('view', compact('Items', 'categories'));
    }

    public function getItemById($id)
    {
        $items = Items::find($id);

        return view('update', ['Items' => $items]);
    }

    public function searchItem(Request $request)
    {
        $search = $request->input('search');

        // Lakukan pencarian berdasarkan nama item atau kriteria lainnya di sini
        $items = Items::where('item_name', 'like', '%'.$search.'%')->get();

        // Kemudian kembalikan hasilnya ke view
        return view('pages.search', compact('items', 'search'));
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
