<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 下午3:54
 */

namespace App\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class UploadsService
{
    public static function saveFile( $files =array()){

        $filepaths = array();
        foreach ($files as $file){
            $filepaths[] = self::saveOneFile($file);
        }

        return $filepaths;

    }

    public static function saveOneFile($file){

        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }
        $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);
        return $filePath;

    }
}