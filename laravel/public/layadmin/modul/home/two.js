layui.config({base: '/layadmin/modul/common/'}).use(['form', 'dialog', 'his'],function(){
    var form = layui.form,
        $ = layui.jquery,
        dialog = layui.dialog,
        his = layui.his;


    $('.subbtntwo').click(function() {

        var home_address = $(".home_address").val()
        localStorage.setItem('home_address', home_address);

        if (home_address == "")
        {
            dialog.error('家庭地址不能为空');
            return false;
        }

        var now_address = $(".now_address").val()
        localStorage.setItem('now_address', now_address);

        if (now_address.length == 0)
        {
            dialog.error('现居地址不能为空');
            return false;
        }

        var weixin = $('.weixin').val()
        localStorage.setItem('weixin', weixin);

        if (weixin.length == 0)
        {
            dialog.error('微信号不能为空');
            return false;
        }
        //
        var father_mobile = $('.father_mobile').val()
        localStorage.setItem('father_mobile', father_mobile);
        //
        if (father_mobile.length == 0)
        {
            dialog.error('父亲电话不能为空');
            return false;
        }

        if(!isTelCode(father_mobile)){
            dialog.error('请输入正确的父亲电话');
            return false;
        }

        var mother_mobile = $('.mother_mobile').val()
        localStorage.setItem('mother_mobile', mother_mobile);

        if (mother_mobile.length == 0)
        {
            dialog.error('母亲电话不能为空');
            return false;
        }

        if(!isTelCode(mother_mobile)){
            dialog.error('请输入正确的母亲电话');
            return false;
        }
        //
        var girlfriend_mobile = $('.girlfriend_mobile').val()
        localStorage.setItem('girlfriend_mobile', girlfriend_mobile);

        if (girlfriend_mobile.length == 0)
        {
            dialog.error('异性电话不能为空');
            return false;
        }

        if(!isTelCode(girlfriend_mobile)){
            dialog.error('请输入正确的异性电话');
            return false;
        }

        var waimai = $('.waimai').val()
        localStorage.setItem('waimai', waimai);

        if (home_address.length == 0)
        {
            dialog.error('外卖地址不能为空');
            return false;
        }

        var taobao = $('.taobao').val()
        localStorage.setItem('taobao', taobao);

        if (home_address.length == 0)
        {
            dialog.error('淘宝地址不能为空');
            return false;
        }

        top.location.href='./three';

    });


    function isTelCode(str) {
        var reg= /^((0\d{2,3}-\d{7,8})|(1[3584]\d{9}))$/;
        return reg.test(str);
    }

});