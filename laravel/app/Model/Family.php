<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 下午3:32
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User;

class Family extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $fillable = [ 'id', 'base_id','home_address','now_address','weixin','father_mobile','mother_mobile','girlfriend_mobile','waimai','taobao'];
    protected $rulesCacheKey = 'rules_cache_v1';

    public function getinfoBybaseId($id){

        $where = ['base_id'=>$id];
        $admins = $this->where($where)->select(['*'])->first();
        return $admins;

    }
}

