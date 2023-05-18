<?php

namespace App\Http\Controllers\Backend;

use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeSize = Size::where('status', 'publish')->paginate(10);
        $draftSize = Size::where('status', 'draft')->paginate(10);
        $trashSize = Size::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.size.index', compact('activeSize', 'draftSize', 'trashSize'));
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
            'name' => 'required|unique:sizes,name'
        ]);
        Size::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return back()->with('success', 'Size added successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('backend.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $size->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect(route('backend.size.index'))->with('success', 'Size edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->status == 'draft';
        $size->save();
        $size->delete();
        return back()->with('success', 'Size info Trashed');
    }
    public function status(Size $size)
    {
        if ($size->status == 'publish') {
            $size->status = 'draft';
            $size->save();
        } else {
            $size->status = 'publish';
            $size->save();
        }
        return back()->with('success',$size->status=='publish' ? 'Size info Published' : 'Size info Drafted');
    }
    public function reStore($id){
        $size=Size::onlyTrashed()->find($id);
        $size->restore();
        return back()->with('success','Size info Restored');
    }
    public function permDelete($id){
        $size=Size::onlyTrashed()->find($id);
        $size->forceDelete();
        return back()->with('success','Size item Deleted');
    }
}
