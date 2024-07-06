<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use function Carbon\Traits\ne;

class InfoController extends Controller
{
    private $info;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->info=Info::orderBy('id','desc')->first();
        return view('admin.info.index',['info'=>$this->info]);
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
        $this->info=new Info();
        $this->info->name=$request->name;
        $this->info->email=$request->email;
        $this->info->mobile=$request->mobile;
        $this->info->phone=$request->phone;
        $this->info->address=$request->address;
        $this->info->save();
        Alert::success('Info Add Successfully','');
        return redirect('info');
    }

    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->info=Info::find($id);
        $this->info->name=$request->name;
        $this->info->email=$request->email;
        $this->info->mobile=$request->mobile;
        $this->info->phone=$request->phone;
        $this->info->address=$request->address;
        $this->info->save();
        Alert::success('Info Update Successfully','');
        return redirect('info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        //
    }
}
