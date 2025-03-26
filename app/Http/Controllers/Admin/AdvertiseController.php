<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertises = Advertise::all();
        return view('admin.advertise.index',compact('advertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $now = now();
        $request->validate([
            "company_name"=>"required|max:255",
            "location"=>"required",
            "expire_date"=>"required|date|after_or_equal:$now",
            "contact"=>"required|numeric|digits:10",
            "redirect_url"=>"required|max:255",
            "image"=>"required|mimes:jpg,png,gif,avif,svg,webp"
        ]);

        $advertise= new Advertise();
        $advertise->company_name = $request->company_name;
        $advertise->location = $request->location;
        $advertise->expire_date = $request->expire_date;
        $advertise->contact = $request->contact;
        $advertise->redirect_url = $request->redirect_url;
        $file = $request->image;
        if($file){
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$filename);
            $advertise->image = "images/$filename";
        }
        $advertise->save();
        return redirect()->route('admin.advertise.index');
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
    public function edit(string $id)
    {
        $advertise = Advertise::find($id);
        return view('admin.advertise.edit',compact('advertise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $now = now();
        $request->validate([
            "company_name"=>"required|max:255",
            "location"=>"required",
            "expire_date"=>"required|date|after_or_equal:$now",
            "contact"=>"required|numeric|digits:10",
            "redirect_url"=>"required|max:255",
            "image"=>"required|mimes:jpg,png,gif,avif,svg,webp"
        ]);

        $advertise= Advertise::find($id);
        $advertise->company_name = $request->company_name;
        $advertise->location = $request->location;
        $advertise->expire_date = $request->expire_date;
        $advertise->contact = $request->contact;
        $advertise->redirect_url = $request->redirect_url;
        $file = $request->image;
        if($file){
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('images',$filename);
            $advertise->image = "images/$filename";
        }
        $advertise->save();
        return redirect()->route('admin.advertise.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advertise = Advertise::find($id);
        $advertise->delete();
        return redirect()->route('admin.advertise.index');
    }
}
