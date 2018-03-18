<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/18
 * Time: 下午2:24
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
use App\Model\Baseinfo;
use App\Model\Photo;
use App\Model\Credit;
use App\Model\Family;
class UserController extends Controller
{
    public function getUserList(){
        return view('user.index.index');
    }

    public function getUserInfo(Request $request,Photo $photo){

//        if ($request->isMethod('get')) {
//            $baseinfo = Baseinfo::find($request->id);
//            $baseId = $baseinfo['id'];
//
//        }else if($request->isMethod('post')){
//            $roleauditinfo = Roleaudit::find($request->id);
//            $baseId = $roleauditinfo['base_id'];
//        }
        $baseinfo = Baseinfo::find($request->id);
        $baseId = $baseinfo['id'];

        $credit = new Credit();
        $family = new Family();

        $photoInfo = $photo->getinfoBybaseId($baseId);
        $familyInfo = $family->getinfoBybaseId($baseId);
        $creditInfo = $credit->getinfoBybaseId($baseId);

        return view('user.index.baseinfo', ['baseinfo' => $baseinfo,'photoInfo'=>$photoInfo,'familyInfo'=>$familyInfo,'creditInfo'=>$creditInfo]);
    }


    public function getUsers(Baseinfo $user, Request $request){
        $res = $user->getUsers($request->all());
        return ajaxSuccess($res['data'], $res['count']);
    }

}