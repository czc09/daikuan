<?php
/**
 * Created by PhpStorm.
 * User: czcofo
 * Date: 2018/3/18
 * Time: 下午5:27
 */

namespace App\Service;
use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;


class AliSendService extends BaseService
{

    public static function send(){

        $config=[
            'app_key'    => getenv('ALI_APP_KEY'),
            'app_secret' => getenv('ALI_APP_SECRET'),
        ];

        $client = new Client(new App($config));

        $req = new AlibabaAliqinFcSmsNumSend();
        $req->setExtend("123456");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("阿里大于");
        $req->setSmsParam("{\"code\":\"1234\",\"product\":\"alidayu\"}");
        $req->setRecNum("15810575564");
        $req->setSmsTemplateCode("SMS_585014");
        $resp = $client->execute($req);

        if(!$resp){
            return false;
        }else{
            return true;
        }
    }

}