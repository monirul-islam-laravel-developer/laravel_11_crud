<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    private $subcategories;
    private $subcategory;
    private $categories;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->subcategories=SubCategory::all();
        return view('admin.subcategory.index',['subcategories'=>$this->subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->categories=Category::all();
        return view('admin.subcategory.create',['categories'=>$this->categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:sub_categories|max:255',
            'category_id' => 'required',
        ]);
        SubCategory::storeSubCategory($request);
        Alert::success('SubCategory Create Successfully'.'');
        return redirect('/subcategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->subcategory=SubCategory::find($id);
        if ($this->subcategory->status ==1)
        {
            $this->subcategory->status=0;
        }
        else
        {
            $this->subcategory->status=1;
        }
        $this->subcategory->save();
        Alert::success('SubCategory Status Upgrated'.'');
        return redirect('/subcategory');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->subcategory=SubCategory::find($id);
        $this->categories=Category::all();
        return view('admin.subcategory.edit',
            [
                'categories'=>$this->categories,
                'subcategory'=>$this->subcategory
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
        SubCategory::updateSubCategory($request,$id);
        Alert::success('SubCategory Update Successfully'.'');
        return redirect('/subcategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->subcategory=SubCategory::find($id);
        if (file_exists($this->subcategory->image))
        {
            unlink($this->subcategory->image);
        }
        $this->subcategory->delete();
        Alert::success('SubCategory Delete Successfully'.'');
        return redirect('/subcategory');
    }
}
