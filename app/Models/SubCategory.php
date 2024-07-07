<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;
    use HasFactory;
    private static $image,$imageName,$imageExtention,$directory,$imageUrl,$subcategory;

    public static function getImageUrl($request)
    {
        self::$image =$request->file('image');
        self::$imageName = time() . '.' . self::$image->getClientOriginalName();
        self::$directory = 'admin/sub-category/image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    public static function storeSubCategory($request)
    {
        self::$subcategory= new SubCategory();
        self::$subcategory->category_id=$request->category_id;
        self::$subcategory->name=$request->name;
        self::$subcategory->slug=Str::slug($request->name);
        if ($request->file('image'))
        {
            self::$subcategory->image=self::getImageUrl($request);
        }
        self::$subcategory->save();
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public static function updateSubCategory($request,$id)
    {
        self::$subcategory=SubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subcategory->image))
            {
                unlink(self::$subcategory->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$subcategory->image;
        }
        self::$subcategory->category_id=$request->category_id;
        self::$subcategory->name=$request->name;
        self::$subcategory->slug=Str::slug($request->name);
        self::$subcategory->image=self::$imageUrl;
        self::$subcategory->save();
    }
}
