<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slider extends Model
{
    use HasFactory;
    use HasFactory;
    private static $image,$imageName,$imageExtention,$directory,$imageUrl,$slider;

    public static function getImageUrl($request)
    {
        self::$image =$request->file('image');
        self::$imageName = time() . '.' . self::$image->getClientOriginalName();
        self::$directory = 'admin/slider/image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    public static function storeSlider($request)
    {
        self::$slider= new Slider();
        self::$slider->title=$request->title;
        self::$slider->slug=Str::slug($request->title);
        self::$slider->link=$request->link;
        if ($request->file('image'))
        {
            self::$slider->image=self::getImageUrl($request);
        }
        self::$slider->save();
    }
    public static function updateSlider($request,$id)
    {
        self::$slider=Slider::find($id);
        if ($request->file('image'))
        {
            if (file_exists( self::$slider->image))
            {
                unlink(self::$slider->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$slider->image;
        }
        self::$slider->title=$request->title;
        self::$slider->slug=Str::slug($request->title);
        self::$slider->link=$request->link;
        self::$slider->image= self::$imageUrl;
        self::$slider->save();
    }
}
