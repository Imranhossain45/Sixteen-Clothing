<?php

namespace App\Http\Controllers\Backend;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeColor = Color::where('status', 'publish')->paginate(10);
        $draftColor = Color::where('status', 'draft')->paginate(10);
        $trashColor = Color::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.color.index', compact('activeColor', 'draftColor', 'trashColor'));
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
            'name' => 'required|unique:colors,name'
        ]);
        Color::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return back()->with('success', 'Color Added Successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('backend.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $color->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect(route('backend.color.index'))->with('success', 'Color Edited Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->status == 'draft';
        $color->save();
        $color->delete();
        return back()->with('success', 'Color info Trashed');
    }
    public function status(Color $color)
    {
        if ($color->status == 'publish') {
            $color->status = 'draft';
            $color->save();
        } else {
            $color->status = 'publish';
            $color->save();
        }
        return back()->with('success', $color->status == 'publish' ? 'Color info Published' : 'Color info Drafted');
    }
    public function reStore($id)
    {
        $color = Color::onlyTrashed()->find($id);
        $color->restore();
        return back()->with('success', 'Color info restored. Check on Draft!');
    }
    public function permDelete($id)
    {
        $color = Color::onlyTrashed()->find($id);
        $color->forceDelete();
        return back()->with('success', 'Color info Deleted');
    }
}
