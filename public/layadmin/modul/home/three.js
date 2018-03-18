layui.config({base: '/layadmin/modul/common/'}).use(['form', 'dialog', 'his'],function() {
    var form = layui.form,
        $ = layui.jquery,
        dialog = layui.dialog,
        his = layui.his;


    $('.subbtn').click(function () {

        var form = document.getElementById("form1");
        var fd = new FormData(form);

           var file = document.querySelector("input[type=file]").files.length
           if(file == 0){
               dialog.error("图片未上传完,请上传文件");
               return false;
           }

        var home_address = localStorage.getItem('home_address');
        var now_address = localStorage.getItem("now_address");
        var weixin = localStorage.getItem('weixin');
        var father_mobile = localStorage.getItem('father_mobile');
        var mother_mobile = localStorage.getItem('mother_mobile');
        var girlfriend_mobile = localStorage.getItem('girlfriend_mobile');
        var name = localStorage.getItem('name');
        var birthdate = localStorage.getItem("birthdate");
        var sex = localStorage.getItem('sex');
        var mobile = localStorage.getItem('mobile');
        var password = localStorage.getItem('password');
        var ant = localStorage.getItem('ant');
        var tokio = localStorage.getItem('tokio');
        var visa = localStorage.getItem('visa');
        var jdb = localStorage.getItem('jdb');
        var idcover = localStorage.getItem('idcover');
        var waimai = localStorage.getItem('waimai');
        var taobao = localStorage.getItem('taobao');

        fd.append("home_address", home_address);
        fd.append("now_address", now_address);
        fd.append("weixin", weixin);
        fd.append("father_mobile", father_mobile);
        fd.append("mother_mobile", mother_mobile);
        fd.append("girlfriend_mobile", girlfriend_mobile);
        fd.append("name", name);
        fd.append("birthdate", birthdate);
        fd.append("sex", sex);
        fd.append("mobile", mobile);
        fd.append("password", password);
        fd.append("ant", ant);
        fd.append("tokio", tokio);
        fd.append("visa", visa);
        fd.append("jdb", jdb);
        fd.append("idcover", idcover);
        fd.append("waimai", waimai);
        fd.append("taobao", taobao);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "form/post",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if(response.code ==0){

                    // setTimeout(function(){//两秒后跳转
                    //     dialog.msg('提交成功,请等待审核。。。');
                    // },3000);
                    // localStorage.clear()
                    // top.location.href='/home/one';

                    layer.msg('提交成功,请等待审核。。。', {
                        time: 0 //不自动关闭
                        ,btn: ['确定提交', '返回']
                        ,yes: function(index){
                            localStorage.clear()
                            top.location.href='/home/one';
                        }
                    });


                }else{
                    dialog.error('提交失败');
                }
            }

        });






        return false;


    });
});


