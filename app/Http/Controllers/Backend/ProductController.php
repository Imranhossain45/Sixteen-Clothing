<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeProduct=Product::where('status','publish')->paginate(10);
        $draftProduct=Product::where('status','draft')->paginate(10);
        $trashProduct=Product::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.product.index',compact('activeProduct', 'draftProduct', 'trashProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        $request->validate([
            'title' => 'required|unique:products,title',
            'description' => 'required|max:3000',
            'category' => 'required',
            'price' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/product/' . $photoName));
        }
        Product::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $photoName,

        ]);
        return back()->with('success', 'Product Item Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $photo = $request->file('photo');
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:3000',
            'category' => 'required',
            'price' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $path = public_path('storage/product/' . $product->photo);
            if (file_exists($path)) {
                unlink($path);
            }

            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/product/' . $photoName));
        }
        $product->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $photoName,

        ]);
        return redirect(route('backend.product.index'))->with('success', 'Product Item Edited Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
