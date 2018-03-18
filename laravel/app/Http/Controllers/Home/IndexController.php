<?php

namespace App\Http\Controllers\Home;

use App\Common\Enum\HttpCode;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Service\BaseInfoService;
use App\Service\RoleauditService;
use Illuminate\Support\Facades\DB;
use App\Model\Roleaudit;
use App\Model\Baseinfo;
use App\Service\FamilyService;
use App\Service\CreditService;
use App\Service\UploadsService;
use App\Service\PhotoService;

class IndexController extends Controller
{
    public function index()
    {
        return view('home.index.index');
    }
    public function two(){
        return view('home.index.two');
    }
    public function three(){
        return view('home.index.three');
    }

    public function from(Request $request){

        if ($request->isMethod('post')) {

            $name = isset($request['name']) ? $request['name'] : '';
            $birthdate = isset($request['birthdate']) ? $request['birthdate'] : '';
            $sex = isset($request['sex']) ? $request['sex'] : '';
            $mobile = isset($request['mobile']) ? $request['mobile'] : '';
            $password = isset($request['password']) ? $request['password'] : '';
            $idcover = isset($request['idcover']) ? $request['idcover'] : '';


            $baseInfo = [
                'name' => $name,
                'birthdate' => $birthdate,
                'sex' => $sex,
                'mobile' => $mobile,
                'password' => $password,
                'idcover' => $idcover
            ];


            $home_address = isset($request['home_address']) ? $request['home_address'] : '';
            $now_address = isset($request['now_address']) ? $request['now_address'] : '';
            $weixin = isset($request['weixin']) ? $request['weixin'] : '';
            $father_mobile = isset($request['father_mobile']) ? $request['father_mobile'] : '';
            $mother_mobile = isset($request['mother_mobile']) ? $request['mother_mobile'] : '';
            $girlfriend_mobile = isset($request['girlfriend_mobile']) ? $request['girlfriend_mobile'] : '';
            $waimai = isset($request['waimai']) ? $request['waimai'] : '';
            $taobao = isset($request['taobao']) ? $request['taobao'] : '';


            $familyInfo = [
                'home_address' => $home_address,
                'now_address' => $now_address,
                'weixin' => $weixin,
                'father_mobile' => $father_mobile,
                'mother_mobile' => $mother_mobile,
                'girlfriend_mobile' => $girlfriend_mobile,
                'waimai' => $waimai,
                'taobao' => $taobao,
            ];


            $ant = isset($request['ant']) ? $request['ant'] : '';
            $tokio = isset($request['tokio']) ? $request['tokio'] : '';
            $visa = isset($request['visa']) ? $request['visa'] : '';
            $jdb = isset($request['jdb']) ? $request['jdb'] : '';

            $creditInfo = [
                'ant' => $ant,
                'tokio' => $tokio,
                'visa' => $visa,
                'jdb' => $jdb,
            ];


            $idcover_up = $request->file('idcover_up');
            $idcover_down = $request->file('idcover_down');
            $handphoto = $request->file('handphoto');
            $in_debt1 = $request->file('in_debt1');
            $in_debt2 = $request->file('in_debt2');

            $photo = [
                'idcover_up' => $idcover_up,
                'idcover_down' => $idcover_down,
                'handphoto' => $handphoto,
                'in_debt1' => $in_debt1,
                'in_debt2' => $in_debt2,
            ];

            DB::beginTransaction();

            try {

                $baseId = Baseinfo::insertGetId($baseInfo);

                $audit_no = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);;

                $audit_info = [
                    'audit_no' => $audit_no,
                    'base_name' => $baseInfo['name'],
                    'base_mobile' => $baseInfo['mobile'],
                    'base_idcover' => $baseInfo['idcover']
                ];

                $audit_info['base_id'] = $baseId;

                $roleaudit = new RoleauditService();
                $roleaudit->addRoleaudit($audit_info);

                $familyInfo['base_id'] = $baseId;

                $familyinfo = new FamilyService();
                $familyinfo->addFamilyInfo($familyInfo);

                $creditInfo['base_id'] = $baseId;

                $recditinfo = new CreditService();
                $recditinfo->addCreditInfo($creditInfo);

                $filePaths = UploadsService::saveFile($photo);

                $photoPaths = [
                    'idcover_up' => $filePaths[0],
                    'idcover_down' => $filePaths[1],
                    'handphoto' => $filePaths[2],
                    'in_debt1' => $filePaths[3],
                    'in_debt2' => $filePaths[4],
                ];


                $photoPaths['base_id'] = $baseId;

                $photoinfo = new PhotoService();
                $photoinfo->addPhotoInfo($photoPaths);
            }catch(\Illuminate\Database\QueryException $ex) {
                DB::rollback();
               return ajaxError('添加失败', HttpCode::BAD_REQUEST);
            }
            DB::commit();

            return ajaxSuccess();

        }

    }

}
