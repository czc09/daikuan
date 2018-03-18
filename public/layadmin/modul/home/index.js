layui.config({base: '/layadmin/modul/common/'}).use(['form', 'dialog', 'his'],function(){
    var form = layui.form,
        $ = layui.jquery,
        dialog = layui.dialog,
        his = layui.his;


    $('.subbtn').click(function() {

        var name = $(".name").val()
        localStorage.setItem('name', name);

        if (name.length == 0) {
            dialog.error('姓名不能为空');
            return false;
        }
        if(!isname(name)){
            dialog.error('请输入正确的姓名');
            return false;
        }

        var birthdate = $(".birthdate").val()
        localStorage.setItem('birthdate', birthdate);

        if (birthdate.length == 0) {
            dialog.error('出生日期不能为空');
            return false;
        }

        var sex = $('.sex').val()
        localStorage.setItem('sex', sex);

        if (sex.length == 0) {
            dialog.error('性别不能为空');
            return false;
        }

        var mobile = $('.mobile').val()
        localStorage.setItem('mobile', mobile);


        if (mobile.length == 0) {
            dialog.error('电话不能为空');
            return false;
        }

        if(!isTelCode(mobile)){
            dialog.error('请输入正确的电话号码');
            return false;
        }

        var idcover = $('.idcover').val()
        localStorage.setItem('idcover', idcover);

        if (idcover.length == 0) {
            dialog.error('身份证号不能为空');
            return false;
        }

        if(!isCorvd(idcover)){
            dialog.error('请输入正确的身份证号');
            return false;
        }



        var password = $('.password').val()
        localStorage.setItem('password', password);

        if (password.length == 0) {
            dialog.error('服务密码不能为空');
            return false;
        }

        var ant = $('.ant').val()
        localStorage.setItem('ant', ant);

        if (ant.length == 0) {
            dialog.error('芝麻信用不能为空');
            return false;
        }

        var tokio = $('.tokio').val()
        localStorage.setItem('tokio', tokio);

        if (tokio.length == 0) {
            dialog.error('花呗额度不能为空');
            return false;
        }

        var visa = $('.visa').val()
        localStorage.setItem('visa', visa);

        if (visa.length == 0) {
            dialog.error('信用卡最高不能为空');
            return false;
        }

        var jdb = $('.jdb').val()
        localStorage.setItem('jdb', jdb)

        if (jdb.length == 0) {
            dialog.error('借贷已贷不能为空');
            return false;
        }

        window.location.replace("./two");
    });


    function isTelCode(str) {
        var reg= /^((0\d{2,3}-\d{7,8})|(1[3584]\d{9}))$/;
        return reg.test(str);
    }

    function isCorvd(str) {
        var reg= /^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/;
        var reg1 = /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;
        if(reg.test(str) || reg1.test(str)){
            return true;
        }
        else {
            return false;
        }

    }
    function isname(str) {
        var reg =  /^([a-zA-Z0-9\u4e00-\u9fa5\·]{1,10})$/;
        return reg.test(str);
    }
});