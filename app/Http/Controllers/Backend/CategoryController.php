<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeCategories = Category::where('status', 'publish')->paginate(10);
        $draftCategories = Category::where('status', 'draft')->paginate(10);
        $trashCategories = Category::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.category.index', compact('activeCategories', 'draftCategories', 'trashCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);
        Category::create([
            'name' => $request->name
        ]);
        return back()->with('success', 'Category Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);
        $category->update([
            'name' => $request->name
        ]);
        return redirect(route('backend.category.index'))->with('success', 'Category Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->status == 'draft';
        $category->save();
        $category->delete();
        return back()->with('success', 'Category Item Trashed');
    }
    public function status(Category $category)
    {
        if ($category->status == 'publish') {
            $category->status = 'draft';
            $category->save();
        } else {
            $category->status = 'publish';
            $category->save();
        }
        return back()->with('success', $category->status == 'publish' ? 'Category info Published' : 'Category info Drafted');
    }
    public function reStore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->restore();
        return back()->with('success', 'Category Item Restored');
    }
    public function permDelete($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->forceDelete();
        return back()->with('success', 'Category Item Deleted');
    }
}
