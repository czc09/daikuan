function uploadimg(imgid,fileid,hiddenid) {
    //imgid指<img />标签id,fileid表示<input type='file' />文件上传标签的id,hiddenid指隐藏域标签id
    $("#"+imgid).attr("src","/assets/img/loading/load.gif").removeClass("load0");//加载loading图片
    $.ajaxFileUpload
    (
        {
            url: 'http://www.admin.cn/admin/file/upload',
            secureuri: false,
            fileElementId: fileid,
            dataType: 'json',
            success: function (data, status)
            {   //data的内容都是在后台php代码中自定义的,json格式返回后在这里以对象的方式的访问
                if(typeof (data.error) != 'undefined'){//上传文件出错
                    var error_msg="";
                    switch(data.error)
                    {
                        case "101": error_msg="文件类型错误";
                            break;
                        case "102": error_msg="文件过大";
                            break;
                        case "400": error_msg="非法上传";
                            break;
                        case "404": error_msg="文件为空";
                            break;
                        default :error_msg="服务器不稳定";
                    }
                    alert(error_msg);
                }else{
                    $("#"+imgid).attr("src",data.path).addClass("load1");//加载返回的图片路径并附加上样式
                    $("#"+hiddenid).val(data.path);//给对应的隐藏域赋值，以便提交时给后台
                }
            },
            error: function (data, status, e)
            {
                alert(e);
            }
        }
    )
}