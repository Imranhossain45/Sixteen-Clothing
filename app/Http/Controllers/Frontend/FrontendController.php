<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function about()
    {
        return view('frontend.page.about');
    }
    public function product()
    {
        $activeProduct = Product::all();
        return view('frontend.page.product',compact('activeProduct'));
    }
    public function contact()
    {
        return view('frontend.page.contact');
    }
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'nullable',
            'message' => 'required',
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return back()->with('success', 'Thanks! Your Message has been sent');
    }
}
