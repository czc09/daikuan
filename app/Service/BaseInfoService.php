<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 上午12:25
 */

namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Model\Baseinfo;

class BaseInfoService extends BaseService
{
    public  function addBaseInfo(array $data) : bool
    {
        $baseinfo = Baseinfo::create($data);

        if (!$baseinfo) {
            $this->error = '添加失败';
            $this->httpCode = HttpCode::BAD_REQUEST;
            return false;
        }
        return true;

    }
}
