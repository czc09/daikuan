<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 上午11:17
 */

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
class Roleaudit extends User
{
    protected $fillable = ['base_name', 'id', 'status','base_mobile','base_idcover','base_id','audit_no'];
    protected $rulesCacheKey = 'rules_cache_v1';

    public $timestamps = true;

    public function getRoleaudits(array $param) : array
    {
        $page = $param['page'];
        $limit = $param['limit'];

        $where = array();
        if(!empty($param['base_mobile'])){
            $where[]= ['base_mobile',$param['base_mobile']];
        }
        if(!empty($param['approver_name'])){
            $where[]= ['approver_name', 'like', $param['approver_name'].'%'];
        }
        if(!empty($param['base_idcover'])){
            $where[]= ['base_idcover', 'like', $param['base_idcover'].'%'];
        }
        if(!empty($param['base_name'])){
            $where[]= ['base_name', 'like', $param['base_name'].'%'];
        }

        $offset = ($page - 1) * $limit;
        $admins = $this->where($where)->select(['*'])
            ->offset($offset)->limit($limit)->get()->toArray();
        $count = $this->where($where)->count();
        return [
            'count' => $count,
            'data' => $admins
        ];

    }

    public function getPassRoleaudits(array $param) : array{

        $page = $param['page'];
        $limit = $param['limit'];

        $where = array();
        if(!empty($param['base_mobile'])){
            $where[]= ['base_mobile',$param['base_mobile']];
        }
        if(!empty($param['approver_name'])){
            $where[]= ['approver_name', 'like', $param['approver_name'].'%'];
        }
        if(!empty($param['base_idcover'])){
            $where[]= ['base_idcover', 'like', $param['base_idcover'].'%'];
        }
        if(!empty($param['base_name'])){
            $where[]= ['base_name', 'like', $param['base_name'].'%'];
        }
        $where[] = ['status'=>2];
        $offset = ($page - 1) * $limit;
        $admins = $this->where($where)->select(['*'])
            ->offset($offset)->limit($limit)->get()->toArray();
        $count = $this->where($where)->count();
        return [
            'count' => $count,
            'data' => $admins
        ];
    }

    public function getRejectRoleaudits(array $param) : array{

        $page = $param['page'];
        $limit = $param['limit'];
        $where = array();
        if(!empty($param['base_mobile'])){
            $where[]= ['base_mobile',$param['base_mobile']];
        }
        if(!empty($param['approver_name'])){
            $where[]= ['approver_name', 'like', $param['approver_name'].'%'];
        }
        if(!empty($param['base_idcover'])){
            $where[]= ['base_idcover', 'like', $param['base_idcover'].'%'];
        }
        if(!empty($param['base_name'])){
            $where[]= ['base_name', 'like', $param['base_name'].'%'];
        }
        $where[] = ['status'=>3];
        $offset = ($page - 1) * $limit;
        $admins = $this->where($where)->select(['*'])
            ->offset($offset)->limit($limit)->get()->toArray();
        $count = $this->where($where)->count();
        return [
            'count' => $count,
            'data' => $admins
        ];
    }

    public function getUnfinishedRoleaudits(array $param) : array{

        $page = $param['page'];
        $limit = $param['limit'];
        $where = array();
        if(!empty($param['base_mobile'])){
            $where[]= ['base_mobile',$param['base_mobile']];
        }
        if(!empty($param['approver_name'])){
            $where[]= ['approver_name', 'like', $param['approver_name'].'%'];
        }
        if(!empty($param['base_idcover'])){
            $where[]= ['base_idcover', 'like', $param['base_idcover'].'%'];
        }
        if(!empty($param['base_name'])){
            $where[]= ['base_name', 'like', $param['base_name'].'%'];
        }

        $where[]= ['status',1];

        $offset = ($page - 1) * $limit;
        $admins = $this->select(['*'])->where($where)
            ->offset($offset)->limit($limit)->get()->toArray();
        $count = $this->where($where)->count();
        return [
            'count' => $count,
            'data' => $admins
        ];

    }


    public function updateStatus($id, $status){

        $re = $this->where('id', $id)->update(['status' => $status]);
        if (!$re) {
            $this->error = '修改失败';
            return false;
        }
        return true;

    }


}

