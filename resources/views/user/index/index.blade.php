@extends("admin.layout.main")

@section("content")
	<blockquote class="layui-elem-quote news_search">
		<div class="layui-inline">
		    <div class="layui-input-inline">
		    	<input type="text" value="" placeholder="账户名" class="layui-input search_input">
		    </div>
		    <a class="layui-btn search_btn">查询</a>
		</div>
		<div class="layui-inline">
			<a class="layui-btn layui-btn-normal add_btn">添加管理员</a>
		</div>
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux"></div>
		</div>
	</blockquote>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<table id="users" lay-filter="usertab"></table>

@endsection
@section("js")
	<script type="text/html" id="sex">
		@{{# if(d.sex == 1){ }}
		<a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="active">男</a>
		@{{#  } else { }}
		<a class="layui-btn layui-btn-warm layui-btn-danger layui-btn-xs" lay-event="active">女</a>
		@{{# } }}
	</script>
	<script type="text/html" id="op">

		<a class="layui-btn layui-btn-xs" lay-event="select">
			查看
		</a>

	</script>
	<script type="text/javascript" src="/layadmin/modul/user/index.js"></script>
@endsection
