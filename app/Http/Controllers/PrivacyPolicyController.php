<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PrivacyPolicyController extends Controller
{
    private $privacyPolicy;
    private $privacyPolicies;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->privacypolicy=PrivacyPolicy::orderBy('id','desc')->first();
        return view('admin.privacyPolicy.index',['privacypolicy'=>$this->privacypolicy]);
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
        $this->privacyPolicy= new PrivacyPolicy();
        $this->privacyPolicy->privacy_policy=$request->privacy_policy;
        $this->privacyPolicy->condition=$request->condition;
        $this->privacyPolicy->save();
        Alert::Success('Privacy Policy Add SuccessFully','');
        return redirect('privacyPolicy');

    }

    /**
     * Display the specified resource.
     */
    public function show(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->privacyPolicy=PrivacyPolicy::find($id);
        $this->privacyPolicy->privacy_policy=$request->privacy_policy;
        $this->privacyPolicy->condition=$request->condition;
        $this->privacyPolicy->save();
        Alert::Success('Privacy Policy Update SuccessFully','');
        return redirect('privacyPolicy');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrivacyPolicy $privacyPolicy)
    {
        //
    }
}
