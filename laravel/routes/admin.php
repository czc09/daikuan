<?php

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@signIn');
    Route::get('captcha/{rcode?}', 'LoginController@captcha');
    Route::get('logout', 'LoginController@logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'IndexController@index');
        Route::get('index', 'IndexController@index');
        Route::get('menu', 'IndexController@getMenu');
        Route::get('forbidden', 'IndexController@forbidden');
        Route::get('main', 'IndexController@main');

        Route::group(['middleware' => 'rbac'], function () {
            Route::get('user/password/edit', 'IndexController@editPassword');
            Route::put('user/password', 'IndexController@editPassword');
            // 管理员管理
            Route::get('usersList', 'RuleController@adminsPage');
            Route::get('users', 'RuleController@getAdmins');
            Route::get('user/create', 'RuleController@addAdmin');
            Route::post('user', 'RuleController@addAdmin');
            Route::get('user/{id}/edit', 'RuleController@editAdmin');
            Route::put('user', 'RuleController@editAdmin');
            Route::patch('user', 'RuleController@activeAdmin');
            Route::delete('user', 'RuleController@delAdmin');
            // 权限管理
            Route::get('rules', 'RuleController@rules');
            Route::get('rule/create', 'RuleController@addRule');
            Route::post('rule', 'RuleController@addRule');
            Route::get('rule/{id}/edit', 'RuleController@editRule');
            Route::put('rule', 'RuleController@editRule');
            Route::delete('rule', 'RuleController@deleteRule');
            Route::patch('rule', 'RuleController@editRuleStatus');
            // 角色管理
            Route::get('role/create', 'RuleController@addRole');
            Route::post('role', 'RuleController@addRole');
            Route::get('role/{id}/edit', 'RuleController@editRole');
            Route::put('role', 'RuleController@editRole');
            Route::delete('role', 'RuleController@deleteRole');
            Route::get('roles', 'RuleController@roles');
            // 权限配置
            Route::get('role/{role_id}/rules', 'RuleController@setRules');
            Route::put('role/{role_id}/rules', 'RuleController@storeRules');

            //审核列表
            Route::get('roleaudits', 'RoleauditController@roleauditsPage');
            Route::get('audits', 'RoleauditController@getAudits');
            Route::get('passroleauditlist', 'RoleauditController@passroleauditsPage');//通过
            Route::get('passroleaudits', 'RoleauditController@getPassAudits');//通过
            Route::get('rejectauditlist', 'RoleauditController@rejectauditsPage');//驳回
            Route::get('rejectaudits', 'RoleauditController@getRejectAudits');//驳回
            Route::get('unfinishedauditlist', 'RoleauditController@unfinishedauditsPage');//未完成
            Route::get('unfinishedaudits', 'RoleauditController@getUnfinishedAudits');//未完成
            Route::patch('passstatus', 'RoleauditController@passStatus');
            Route::patch('rejectstatus', 'RoleauditController@rejectStatus');
            Route::delete('delroleaudit', 'RoleauditController@deleteRoleaudit');


            Route::get('getuserlist', 'UserController@getUserList');//用户列表
            Route::get('getusers', 'UserController@getUsers');//用户列表
            Route::get('getuserinfo/{id}/info', 'UserController@getuserInfo');//用户信息

        });
    });

});