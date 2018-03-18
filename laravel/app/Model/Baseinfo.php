<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 上午12:21
 */

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;


class Baseinfo extends User
{
    public $timestamps = false;
    protected $guarded = [];

    protected $fillable = ['name', 'id', 'status','birthdate','sex','mobile','idcover','password'];
    protected $rulesCacheKey = 'rules_cache_v1';


    public function getUsers(array $param) : array{

        $page = $param['page'];
        $limit = $param['limit'];
        $where = $param['name'] ?? [];
        if ($where) $where = [['name', 'like', $where.'%']];
        $offset = ($page - 1) * $limit;
        $admins = $this->where($where)->select(['*'])
            ->offset($offset)->limit($limit)->get()->toArray();
        $count = $this->where($where)->count();
        return [
            'count' => $count,
            'data' => $admins
        ];

    }
}

