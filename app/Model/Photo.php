<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 下午4:10
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Photo extends User
{

    public $timestamps = false;
    protected $guarded = [];

    protected $fillable = [ 'id','base_id','idcover_up','idcover_down','handphoto','in_debt1','in_debt2'];
    protected $rulesCacheKey = 'rules_cache_v1';

    public function getinfoBybaseId($id){

        $where = ['base_id'=>$id];
        $admins = $this->where($where)->select(['*'])->first();
        return $admins;

    }

}



