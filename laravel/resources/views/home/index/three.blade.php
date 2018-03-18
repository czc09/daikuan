<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
	<title></title>
	<link href="/home/style.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="/home/js/jquery-1.7.1.min.js"></script>
	<style>
		.file {
			position: relative;
			display: inline-block;
			background: #D0EEFF;
			border: 1px solid #99D3F5;
			border-radius: 4px;
			padding: 4px 12px;
			overflow: hidden;
			color: #1E88C7;
			text-decoration: none;
			text-indent: 0;
			line-height: 20px;
		}
		.file input {
			position: absolute;
			font-size: 100px;
			right: 0;
			top: 0;
			opacity: 0;
		}
		.file:hover {
			background: #AADFFD;
			border-color: #78C3F3;
			color: #004974;
			text-decoration: none;
		}

	</style>
</head>
<body>
<div class="t-top"><!--头部-->
	<a href="./two"><img src="/home/images/return.png"></a>
	<div onMouseOut="$('#t-nav').hide();" onMouseOver="$('#t-nav').show();">
		<span>我要贷款</span>
	</div>

</div><!--头部-->
<div class="t-main1">
	<span style="padding-top: 20px;">身份信息</span>
	<form name="form1" id="form1">

		<div class="t-main1" style="padding-top: 20px; margin-left:50px;" >

			<div class="t-main3-list" style="padding-top: 20px;" >
				<label>身份证正面：</label>
				<input type="file" name="idcover_up" style="border: 1px solid #99D3F5 " class="fileInput"/>
			</div>

			<div class="t-main3-list" style="padding-top: 20px;" >
				<label>身份证反面：</label>
				<input type="file" name="idcover_down" style="border: 1px solid #99D3F5 " class="fileInput"/>
			</div>
			<div class="t-main3-list" style="padding-top: 20px; ">
				<label>手持照片:</label>
				<input type="file"  name="handphoto" style="border: 1px solid #99D3F5 "class="fileInput"/>
			</div>
			<div class="t-main3-list" style="padding-top: 20px;">
				<label>借条-:负债截图：</label>
				<input type="file"  name="in_debt1" style="border: 1px solid #99D3F5 "class="fileInput"/>
			</div>
			<div class="t-main3-list" style="padding-top: 20px;">
				<label>借条二:负债截图：</label>
				<input type="file" name="in_debt2" style="border: 1px solid #99D3F5 " class="fileInput"/>
			</div>
			<meta name="csrf-token" content="{{ csrf_token() }}">
			<div class="subbtn"  style="margin-left:-20px; " >提交</div></a>
		</div>
	</form>

	<script>

	</script>
</div>

</body>
<script type="text/javascript" src="/layadmin/layui/layui.js"></script>
<script type="text/javascript" src="/layadmin/modul/home/three.js"></script>
</html>

