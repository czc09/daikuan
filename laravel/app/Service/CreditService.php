<?php

/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 上午12:25
 */

namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\Model\Credit;

class CreditService extends BaseService
{
    public  function addCreditInfo(array $data) : bool
    {
        $creditinfo = Credit::create($data);

        if (!$creditinfo) {
            $this->error = '添加失败';
            $this->httpCode = HttpCode::BAD_REQUEST;
            return false;
        }
        return true;

    }
}
