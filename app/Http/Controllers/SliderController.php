<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    private $sliders;
    private $slider;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->sliders=Slider::all();
        return view('admin.slider.index',['sliders'=>$this->sliders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Slider::storeSlider($request);
        Alert::success('Slider Add Successfully');
        return redirect('slider');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->slider=Slider::find($id);
        if ( $this->slider->status==1)
        {
            $this->slider->status=0;
        }
        else
        {
            $this->slider->status=1;
        }
        $this->slider->save();
        Alert::success('Slider Status Upgradeted','');
        return redirect('slider');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->slider=Slider::find($id);
        return view('admin.slider.edit',['slider'=>$this->slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Slider::updateSlider($request,$id);
        Alert::success('Slider Upgrate Successfully','');
        return redirect('slider');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->slider=Slider::find($id);
        if (file_exists( $this->slider->image))
        {
            unlink( $this->slider->image);
        }
        $this->slider->delete();
        Alert::success('Slider Delete Successfully','');
        return redirect('slider');
    }
}
