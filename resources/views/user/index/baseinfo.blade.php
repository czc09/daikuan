{{--<script type="text/javascript" src="/layadmin/modul/user/baseinfo.js"></script>--}}

@extends("admin.layout.main")
<style>

	.aixuexi img{width:100%;height:100%;}

	.aixuexi{
		width:200px;
		height:200px;
	}

</style>
@section("content")

	<div class="layui-tab">
		<ul class="layui-tab-title">
			<li class="layui-this">基本信息</li>
			<li>家庭信息</li>
			<li>照片信息</li>
		</ul>
		<div class="layui-tab-content">
			<div class="layui-tab-item layui-show">

				<form class="layui-form" action="">


					<div style="width:40%;float:left;">
						<div class="layui-form-item">
							<label class="layui-form-label">姓名</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$baseinfo['name']}}" lay-verify="required" placeholder="请输入权限名称">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">出生日期</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$baseinfo['birthdate']}}" lay-verify="required" placeholder="请输入权限名称">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">电话号码</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$baseinfo['mobile']}}" lay-verify="required" placeholder="请输入权限名称">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">身份证号码</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$baseinfo['idcover']}}" lay-verify="required" placeholder="请输入权限名称">
							</div>
						</div>
					</div>

					<div style="width:40%;float: left">

						<div class="layui-form-item">
							<label class="layui-form-label">芝麻信用</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$creditInfo['ant']}}" lay-verify="required" placeholder="请输入权限名称">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">花呗额度</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$creditInfo['tokio']}}" lay-verify="required" placeholder="请输入权限名称">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">信用卡最高</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$creditInfo['visa']}}" lay-verify="required" placeholder="请输入权限名称">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">借贷宝已贷</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$creditInfo['jdb']}}" lay-verify="required" placeholder="请输入权限名称">
							</div>
						</div>

					</div>
				</form>

			</div>

			<div class="layui-tab-item">

				<form class="layui-form1" action="">

					<div style="width:40%;float: left">

						<div class="layui-form-item">
							<label class="layui-form-label">家庭住址</label>
							<div class="layui-input-block" style="width: 300px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$familyInfo['home_address']}}" lay-verify="required" >
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">现居地址</label>
							<div class="layui-input-block" style="width: 300px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$familyInfo['now_address']}}" lay-verify="required" >
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">微信号</label>
							<div class="layui-input-block" style="width: 300px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$familyInfo['weixin']}}" lay-verify="required">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">父亲电话</label>
							<div class="layui-input-block" style="width: 300px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$familyInfo['father_mobile']}}" lay-verify="required" >
							</div>
						</div>

					</div>

					<div style="width:40%;float: left">
						<div class="layui-form-item">
							<label class="layui-form-label">母亲电话</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$familyInfo['mother_mobile']}}" lay-verify="required" >
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">异性电话</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$familyInfo['girlfriend_mobile']}}" lay-verify="required" >
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">外卖地址</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$familyInfo['waimai']}}" lay-verify="required" >
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">淘宝地址</label>
							<div class="layui-input-block" style="width: 200px;">
								<input type="text" class="layui-input" name="title" readonly="readonly" value="{{$familyInfo['taobao']}}" lay-verify="required" >
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="layui-tab-item">

				<form class="layui-form1" action="">

					<div style="float: left;margin-left:50px;">

						<div class="layui-form-item " style="padding:30px;">
							<label class="layui-form-label">身份证正面</label>
								<div class="layui-upload-list aixuexi" style="float: left">
									<img class="layui-upload-img " id="demo1" src="{{$photoInfo['idcover_up']}}">
									<p id="demoText"></p>
								</div>

							<label class="layui-form-label">身份证反面</label>
							<div class="layui-upload-list aixuexi " style="float: left">
								<img class="layui-upload-img" id="demo1" src="{{$photoInfo['idcover_down']}}">
								<p id="demoText"></p>
							</div>

							<label class="layui-form-label">手持照片</label>
							<div class="layui-upload-list aixuexi" style="float: left">
								<img class="layui-upload-img" id="demo1" src="{{$photoInfo['handphoto']}}">
								<p id="demoText"></p>
							</div>

						</div>


						<div class="layui-form-item " style="padding:30px; ">
							<label class="layui-form-label">借条-:负债截图</label>
							<div class="layui-upload-list aixuexi" style="float: left">
							<img class="layui-upload-img" id="demo1" src="{{$photoInfo['in_debt1']}}">
							<p id="demoText"></p>
							</div>
							<label class="layui-form-label">借条二:负债截图</label>

							<div class="layui-upload-list aixuexi" style="float: left">
							<img class="layui-upload-img" id="demo1" src="{{$photoInfo['in_debt2']}}">
							<p id="demoText"></p>
							</div>
						</div>

					</div>

				</form>

			</div>
		</div>
	</div>
	<script>
        //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
        layui.use('element', function(){
            var element = layui.element;

            //…
        });
	</script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<table id="users" lay-filter="usertab"></table>
@endsection

@section("js")
	<script type="text/javascript" src="/layadmin/modul/user/baseinfo.js"></script>
@endsection

