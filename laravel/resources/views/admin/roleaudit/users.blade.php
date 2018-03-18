@extends("admin.layout.main")

@section("content")
	<blockquote class="layui-elem-quote news_search">
		<div class="layui-inline">
		    <div class="layui-input-inline">
		    	<input type="text" value="" placeholder="姓名" class="layui-input base_name_input">
		    </div>
			<div class="layui-input-inline">
				<input type="text" value="" placeholder="身份证" class="layui-input base_idcover_input">
			</div>
			<div class="layui-input-inline">
				<input type="text" value="" placeholder="手机号" class="layui-input base_mobile_input">
			</div>
			<div class="layui-input-inline">
				<input type="text" value="" placeholder="审核人" class="layui-input approver_name_input">
			</div>
		    <a class="layui-btn search_btn" lay-event="search">查询</a>
		</div>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux"></div>
		</div>
	</blockquote>
	<table id="users" lay-filter="usertab"></table>

@endsection

@section("js")
	<script type="text/html" id="status">

		@{{# if(d.status == 1){ }}
		<a class="layui-btn layui-btn-primary layui-btn-xs" >审核中</a>
		@{{#  } else if(d.status == 2) { }}
		<a class="layui-btn layui-btn-xs">通过</a>
		@{{#  } else if(d.status == 3) { }}
		<a class="layui-btn layui-btn-danger layui-btn-xs">驳回</a>
		@{{# } }}

	</script>
	<script type="text/html" id="op">

		<a class="layui-btn layui-btn-normal layui-btn-xs edit_user" lay-event="edit">
			查看
		</a>
		{{--@{{# } }}--}}
		<a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="active">审核通过</a>
		<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="reject">驳回</a>
		<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">
			<i class="layui-icon"></i>
			删除
		</a>

	</script>
	<script type="text/javascript" src="/layadmin/modul/roleaudit/users.js"></script>
@endsection

