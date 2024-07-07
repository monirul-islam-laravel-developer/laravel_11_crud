<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LogoController extends Controller
{
    private $logo;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Logo::orderBy('id', 'desc')->first();
        return view('admin.logo.index', compact('logo'));
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
        Logo::MultiLogo($request);
        Alert::success('Logo Create Successfully');
        return redirect('logos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Logo::updateMultilogo($request,$id);
        Alert::success('Logo Update Successfully');
        return redirect('logos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logo $logo)
    {
        //
    }
}
