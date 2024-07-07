<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    private static $image,$imageName,$imageExtention,$directory,$imageUrl,$multiLogo,$desctopLogo,$mobileLogo;

    public static function mobileImageUrl($request)
    {
        self::$image =$request->file('mobile_logo');
        self::$imageName = time() . '.' . self::$image->getClientOriginalName();
        self::$directory = 'admin/mobile-logo/image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    public static function desctopImageUrl($request)
    {
        self::$image =$request->file('desktop_logo');
        self::$imageName = time() . '.' . self::$image->getClientOriginalName();
        self::$directory = 'admin/desktop-logo/image/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    public static function MultiLogo($request)
    {
        self::$multiLogo= new Logo();
        if ($request->mobile_logo)
        {
            self::$multiLogo->mobile_logo=self::mobileImageUrl($request);
        }
        if ($request->desktop_logo)
        {
            self::$multiLogo->desktop_logo=self::desctopImageUrl($request);
        }

        self::$multiLogo->save();

    }
    public static function updateMultilogo($request,$id)
    {
        self::$multiLogo=Logo::find($id);
        if ($request->file('mobile_logo'))
        {
            if (file_exists(self::$multiLogo->mobile_logo))
            {
                unlink(self::$multiLogo->mobile_logo);
            }
            self::$mobileLogo=self::mobileImageUrl($request);
        }
        else
        {
            self::$mobileLogo=self::$multiLogo->mobile_logo;
        }
        if ($request->file('desktop_logo'))
        {
            if (file_exists(self::$multiLogo->desktop_logo))
            {
                unlink(self::$multiLogo->desktop_logo);
            }
            self::$desctopLogo=self::desctopImageUrl($request);
        }
        else
        {
            self::$desctopLogo=self::$multiLogo->desktop_logo;
        }
        self::$multiLogo->mobile_logo=self::$mobileLogo;
        self::$multiLogo->desktop_logo=self::$desctopLogo;
        self::$multiLogo->save();
    }
}
