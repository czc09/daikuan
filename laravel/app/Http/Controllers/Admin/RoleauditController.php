<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/17
 * Time: 下午5:10
 */

namespace App\Http\Controllers\Admin;

use App\Common\Enum\HttpCode;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Service\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Roleaudit;
use Illuminate\Support\Facades\Log;
use App\Service\AliSendService;
use App\Model\Baseinfo;
use App\Model\Photo;
use App\Model\Credit;
use Illuminate\Support\Facades\DB;
use App\Model\Family;
class RoleauditController extends Controller
{
    /**
     * 后台用户列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roleauditsPage()
    {
        return view('admin.roleaudit.users');
    }
    public function passroleauditsPage()
    {
        return view('admin.roleaudit.passusers');
    }

    public function rejectauditsPage()
    {
        return view('admin.roleaudit.rejectusers');
    }

    public function unfinishedauditsPage(){
        return view('admin.roleaudit.unfinishedusers');
    }

    public function getAudits(Request $request, Roleaudit $roleaudit){
        $res = $roleaudit->getRoleaudits($request->all());
        return ajaxSuccess($res['data'], $res['count']);
    }
    public function getPassAudits(Request $request, Roleaudit $roleaudit){
        $res = $roleaudit->getPassRoleaudits($request->all());
        return ajaxSuccess($res['data'], $res['count']);
    }
    public function getRejectAudits(Request $request, Roleaudit $roleaudit){
        $res = $roleaudit->getRejectRoleaudits($request->all());
        return ajaxSuccess($res['data'], $res['count']);
    }
    public function getUnfinishedAudits(Request $request, Roleaudit $roleaudit){
        $res = $roleaudit->getUnfinishedRoleaudits($request->all());
        return ajaxSuccess($res['data'], $res['count']);
    }

    /**
     * 状态改变
     */
    public function activeAudit($id, $status, Roleaudit $roleaudit)
    {

            $user = Auth::guard('admin')->user();
            $adminName = $user['truename'];
            $time =date('Y-m-d H:i:s');
            $data =[
                'name' => $adminName,
                'time' => $time
            ];

            $re = Roleaudit::where('id', $id)->update(['status' => $status,'approver_name'=>$adminName,'approver_time'=>$time]);
            if (!$re) return ajaxError('修改失败', HttpCode::BAD_REQUEST);
            return ajaxSuccess($data);
    }

    public function passStatus(Request $request,Roleaudit $roleaudit){

        $id = $request->id;
        $status = 2;
        return $this->activeAudit($id, $status, $roleaudit);

    }

    public function rejectStatus(Request $request,Roleaudit $roleaudit){

        $id = $request->id;
        $status = 3;

        return $this->activeAudit($id, $status, $roleaudit);

    }

    public function deleteRoleaudit(Request $request, Roleaudit $roleaudit)
    {
        DB::beginTransaction();

        try {

            $rileaudit = Roleaudit::find($request->id);
            $rileaudit->delete();

            $base_id = $rileaudit['base_id'];

            $baseInfo = Baseinfo::find($base_id);
            $baseInfo->delete();

            $photoInfo = Photo::where(['base_id' => $base_id])->delete();

            $creditInfo = Credit::where(['base_id' => $base_id])->delete();

            $familyInfo = Family::where(['base_id' => $base_id])->delete();

            }catch(\Illuminate\Database\QueryException $ex) {
                    DB::rollback();
                    return ajaxError('添加失败', HttpCode::BAD_REQUEST);
           }
          DB::commit();

         return ajaxSuccess();
    }

    public function deleteRule(int $id) : bool
    {
        $hasChild = Rule::where('pid', $id)->count();
        if ($hasChild > 0) {
            $this->error = '该权限存在子权限,不能被删除';
            $this->httpCode = HttpCode::FORBIDDEN;
            return false;
        }
        $rule = Rule::find($id);
        DB::beginTransaction();
        $re1 = $rule->roles()->detach();
        $re2 = $rule->delete();
        if (($re1 === false) || !$re2) {
            DB::rollBack();
            $this->error = '删除失败';
            $this->httpCode = HttpCode::BAD_REQUEST;
            return false;
        }
        DB::commit();
        return true;
    }







}
