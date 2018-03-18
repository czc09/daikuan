layui.use('element', function(){
    var element = layui.element;

//一些事件监听
    element.on('tab(demo)', function(data){
        console.log(data);
    });
});

// layui.config({base: '/layadmin/modul/common/'}).use(['table', 'dialog', 'his'], function(){
//     var table = layui.table
//         ,dialog = layui.dialog
//         ,his = layui.his
//         ,$ = layui.$;
//
//     table.render({
//         elem: '#users'
//         ,url: '/admin/getusers' //数据接口
//         ,method: 'get'
//         ,page: true //开启分页
//         ,limit: 10
//         ,limits: [10, 20]
//         ,cols: [[ //表头
//             {field: 'id', title: 'ID',width: 0}
//             ,{field: 'name', title: '姓名', sort: true,width: 180}
//             ,{field: 'birthdate', title: '出生日期'}
//             ,{field: 'sex', title: '性别' ,sort: true,toolbar: '#sex'}
//             ,{field: 'mobile', title: '联系电话'}
//             ,{field: 'idcover', title: '身份证号'}
//             ,{title: '操作', toolbar: '#op',width: 190}
//         ]]
//         ,response: {
//             statusName: 'code'
//             ,statusCode: 0
//             ,msgName: 'msg'
//             ,countName: 'meta'
//             ,dataName: 'data'
//         }
// //				,skin: 'row' // 'line', 'row', 'nob'
//         ,even: false //开启隔行背景
// //                ,size: 'lg' // 'sm', 'lg'
//
//     });
//
//     table.on('tool(usertab)', function(obj){
//         var data = obj.data;      //获得当前行数据
//         var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
//         var tr = obj.tr;          //获得当前行 tr 的DOM对象
//
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//
//         if (layEvent == 'active') {
//             dialog.confirm('确认进行此操作', function () {
//                 var loadIndex = dialog.load('修改中，请稍候');
//                 var newStatus = 2;
//                 var myDate = new Date();
//                 his.ajax({
//                     url: '/admin/passstatus'
//                     ,type: 'patch'
//                     ,data: {id: data.id}
//                     ,complete: function () {
//                         dialog.close(loadIndex);
//                     }
//                     ,error: function (msg) {
//                         dialog.error(msg);
//                     }
//                     ,success: function (msg, data, meta) {
//
//                         dialog.msg('已更改成功');
//                         obj.update({
//                             status: newStatus,
//                             approver_name :data.name,
//                             approver_time :data.time
//                         });
//
//                     }
//                 });
//             });
//         }
//         else if (layEvent == 'reject') {
//             dialog.confirm('确认进行此操作', function () {
//                 var loadIndex = dialog.load('修改中，请稍候');
//                 var newStatus = 3;
//                 var myDate = new Date();
//                 his.ajax({
//                     url: '/admin/rejectstatus'
//                     ,type: 'patch'
//                     ,data: {id: data.id}
//                     ,complete: function () {
//                         dialog.close(loadIndex);
//                     }
//                     ,error: function (msg) {
//                         dialog.error(msg);
//                     }
//                     ,success: function (msg, data, meta) {
//
//                         dialog.msg('已更改成功');
//                         obj.update({
//                             status: newStatus,
//                             approver_time :data.time
//                         });
//
//                     }
//                 });
//             });
//         } else if (layEvent == 'edit') {
//             dialog.open('编辑管理员', '/admin/user/'+data.id+'/edit');
//
//         } else if (layEvent == 'del') {
//             dialog.confirm('确认删除改用户么', function () {
//                 var loadIndex = dialog.load('删除中，请稍候');
//                 his.ajax({
//                     url: '/admin/user'
//                     ,type: 'delete'
//                     ,data: {id: data.id}
//                     ,complete: function () {
//                         dialog.close(loadIndex);
//                     }
//                     ,error: function (msg) {
//                         dialog.error(msg);
//                     }
//                     ,success: function () {
//                         dialog.msg('删除成功');
//                         obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
//                     }
//                 });
//             })
//
//         }
//
//     });
//
//     function flushTable (cond, sortObj) {
//         var query = {
//             where: {
//                 cond: cond
//             }
//             ,page: {
//                 curr: 1
//             }
//         };
//         if (sortObj != null) {
//             query.initSort = sortObj;
//             // query.where.sortField = sortObj.field;   // 排序字段
//             // query.where.order = sortObj.type;        //排序方式
//         }
//         table.reload('users', query);
//     }
//
//     // 搜索
//     $('.search_btn').click(function () {
//         var base_name = $('.search_input').val();
//         flushTable(base_name);
//     });
//
//     // // 排序
//     // table.on('sort(usertab)', function (obj) {
//     //     var cond = $('.search_input').val();
//     //     flushTable(cond, obj);
//     // });
//
//     // 添加管理员
//     $('.add_btn').click(function () {
//         dialog.open('添加管理员', '/admin/user/create');
//     });
//
// });