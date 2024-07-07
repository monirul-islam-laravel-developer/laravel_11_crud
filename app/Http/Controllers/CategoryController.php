<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    private $categories;
    private $category;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index',['categories'=>Category::orderBy('id','asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::storeCategory($request);
        Alert::success('Category Store Successfully','');
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->category=Category::find($id);
        if ($this->category->status==1)
        {
            $this->category->status=0;
        }
        else
        {
            $this->category->status=1;
        }
        $this->category->save();
        Alert::success('Category Status Upgradated','');
        return redirect('/category');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->category=Category::find($id);
        return view('admin.category.edit',['category'=>$this->category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Category::updateCategory($request,$id);
        Alert::success('Category Update Successfully','');
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->category=Category::find($id);
        if ($this->category->subcategories)
            foreach ($this->category->subcategories as $subcategory)
            {
                if (file_exists($subcategory->image))
                {
                    unlink($subcategory->image);
                }
                $subcategory->delete();
            }
        if (file_exists($this->category->image))
        {
            unlink($this->category->image);
        }

        $this->category->delete();
        Alert::success('Category Delete Successfully','');
        return redirect('/category');
    }
}
