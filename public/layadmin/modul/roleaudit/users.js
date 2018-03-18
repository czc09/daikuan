layui.config({base: '/layadmin/modul/common/'}).use(['table', 'dialog', 'his'], function(){
    var table = layui.table
        ,dialog = layui.dialog
        ,his = layui.his
        ,$ = layui.$;

    table.render({
        elem: '#users'
        ,url: '/admin/audits' //数据接口
        ,method: 'get'
        ,page: true //开启分页
        ,limit: 10
        ,limits: [10, 20]
        ,cols: [[ //表头
            {field: 'id', title: 'ID',width: 40}
            ,{field: 'audit_no', title: '客户编号', sort: true,width: 180}
            ,{field: 'approver_name', title: '审核人',width: 90}
            ,{field: 'approver_time', title: '审核时间' ,sort: true,width: 200}
            ,{field: 'base_name', title: '姓名',width: 90}
            ,{field: 'base_idcover', title: '身份证号',width: 90}
            ,{field: 'status', title: '状态',sort: true,templet:'#status',width: 90}
            ,{field: 'created_at', title: '创建时间',sort: true,width: 90}
            ,{title: '操作', toolbar: '#op',width: 250}
        ]]
        ,response: {
            statusName: 'code'
            ,statusCode: 0
            ,msgName: 'msg'
            ,countName: 'meta'
            ,dataName: 'data'
        }
//				,skin: 'row' // 'line', 'row', 'nob'
        ,even: false //开启隔行背景
//                ,size: 'lg' // 'sm', 'lg'

    });

    table.on('tool(usertab)', function(obj){
        var data = obj.data;      //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
        var tr = obj.tr;          //获得当前行 tr 的DOM对象

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (layEvent == 'active') {
            dialog.confirm('确认进行此操作', function () {
                var loadIndex = dialog.load('修改中，请稍候');
                var newStatus = 2;
                his.ajax({
                    url: '/admin/passstatus'
                    ,type: 'patch'
                    ,data: {id: data.id, status: newStatus}
                    ,complete: function () {
                        dialog.close(loadIndex);
                    }
                    ,error: function (msg) {
                        dialog.error(msg);
                    }
                    ,success: function (msg, data, meta) {
                        dialog.msg('已更改成功');
                        obj.update({
                            status: newStatus,
                            approver_name :data.name,
                            approver_time:data.time
                        });
                        location.reload();
                    }
                });
            });
        } else if (layEvent == 'reject') {
            dialog.confirm('确认进行此操作', function () {
                var loadIndex = dialog.load('修改中，请稍候');
                var newStatus = 3;
                his.ajax({
                    url: '/admin/rejectstatus'
                    ,type: 'patch'
                    ,data: {id: data.id, status: newStatus}
                    ,complete: function () {
                        dialog.close(loadIndex);
                    }
                    ,error: function (msg) {
                        dialog.error(msg);
                    }
                    ,success: function (msg, data, meta) {
                        dialog.msg('已更改成功');
                        obj.update({
                            status: newStatus,
                            approver_name :data.name,
                            approver_time:data.time
                        });
                        location.reload();
                    }
                });
            });
        } else if (layEvent == 'edit') {
            dialog.open('查看信息详情', '/admin/getuserinfo/'+data.base_id+'/info');

        } else if (layEvent == 'del') {
            dialog.confirm('确认删除改用户么', function () {
                var loadIndex = dialog.load('删除中，请稍候');
                his.ajax({
                    url: '/admin/user'
                    ,type: 'delete'
                    ,data: {id: data.id}
                    ,complete: function () {
                        dialog.close(loadIndex);
                    }
                    ,error: function (msg) {
                        dialog.error(msg);
                    }
                    ,success: function () {
                        dialog.msg('删除成功');
                        obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                    }
                });
            })

        }
    });

    function flushTable (base_name, base_idcover,base_mobile,approver_name, sortObj) {
        var query = {
            where: {
                base_name:base_name,
                base_idcover:base_idcover,
                base_mobile:base_mobile,
                approver_name:approver_name
            }
            ,page: {
                curr: 1
            }
        };
        if (sortObj != null) {
            query.initSort = sortObj;
            // query.where.sortField = sortObj.field;   // 排序字段
            // query.where.order = sortObj.type;        //排序方式
        }
        table.reload('users', query);
    }

    $('.search_btn').click(function () {

            var base_name = $('.base_name_input').val();
            var base_idcover = $('.base_idcover_input').val();
            var base_mobile = $('.base_mobile_input').val();
            var approver_name = $('.approver_name_input').val();

            flushTable(base_name, base_idcover,base_mobile,approver_name);
    });
    // 搜索
    // $('.search_btn').click(function () {
    //
    //
    //     var base_name = $('.base_name_input').val();
    //     var base_idcover = $('.base_idcover_input').val();
    //     var base_mobile = $('.base_mobile_input').val();
    //     var approver_name = $('.approver_name_input').val();
    //     flushTable(base_name, base_idcover,base_mobile,approver_name);
    // });



    // // 排序
    // table.on('sort(usertab)', function (obj) {
    //     var cond = $('.search_input').val();
    //     flushTable(cond, obj);
    // });

});