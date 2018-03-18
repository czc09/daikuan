<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 下午3:31
 */

namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Model\Family;
class FamilyService
{
    public  function addFamilyInfo(array $data) : bool
    {
        $family = Family::create($data);

        if (!$family) {
            $this->error = '添加失败';
            $this->httpCode = HttpCode::BAD_REQUEST;
            return false;
        }
        return true;

    }
}

