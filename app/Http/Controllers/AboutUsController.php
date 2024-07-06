<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AboutUsController extends Controller
{
    private $aboutus;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->aboutus=AboutUs::orderBy('id','desc')->first();
        return view('admin.aboutus.index',['aboutus'=>$this->aboutus]);
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
        $this->aboutus= new AboutUs();
        $this->aboutus->about_us=$request->about_us;
        $this->aboutus->save();
        Alert::success('About Us Add Successfuly'.'');
        return redirect('aboutus');
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->aboutus=AboutUs::find($id);
        $this->aboutus->about_us=$request->about_us;
        $this->aboutus->save();
        Alert::success('About Us Update Successfuly'.'');
        return redirect('aboutus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
