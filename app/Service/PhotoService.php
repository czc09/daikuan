<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 下午4:11
 */

namespace App\Service;

use App\Model\Photo;
class PhotoService
{
    public  function addPhotoInfo(array $data) : bool
    {
        $photo = Photo::create($data);

        if (!$photo) {
            $this->error = '添加失败';
            $this->httpCode = HttpCode::BAD_REQUEST;
            return false;
        }
        return true;

    }
}