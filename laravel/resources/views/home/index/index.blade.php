<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="中环地产网--南昌二手房最大交易品牌" />
		<meta name="description" content="中环地产顾问有限公司成立于2001年10月，是一家以地产经纪业务为核心的房地产综合服务体。中环地产自成立以来秉承着“心存高远，脚踏实地”的核心价值观，从最初的十几家门店，发展成为拥有多家地市级分公司、220余家门店、1700余名从业人员的公司。在南昌市，中环地产在房地产经纪行业市场占有率稳居第一，创造并多次刷新了南昌市行业交易纪录。中环地产始终把“诚信”作为企业的核心价值理念，把实现百姓安居，促进社会和谐作为企业的崇高使命。诚信专业的办事原则，严谨务实的工作作风，方便快捷的办事效率，真诚体贴的服务态度，赢得上级主管部门和社会各界的一致好评。江西省政府授予“全省就业先进企业”，南昌市政府授予“服务业发展诚信单位”，南昌市唯一五星级房产中介机构，南昌市存量房成交量第一名企业。未来十年，中环地产致力于打造一个公平、专业、便捷的房地产交易平台，为广大置业者实现安居梦想，成就美满人生，让所有为理想奋斗的中环人获得持续成长、成功、成就。"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/> 
		<title></title>
		<link href="/home/style.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="/home/js/jquery-1.7.1.min.js"></script>
	</head>
		<div class="t-top"><!--头部-->
		   	<span>我要贷款</span>
		</div>
		<div class="t-main1">
			<span>基本信息</span>
			<div class="t-main1-list" >
				<label>姓名：</label><input type="text" class="name-input name" name="name"/>
			</div>
			<div class="t-main1-list" style="padding-top: 20px;" class="selcet-input" >
				<label>出生日期：</label><input type="date" class="name-input birthdate" value="2000-09-27" style="margin-left: 1px;" />
			</div>
			<div class="t-main1-list" style="padding-top: 20px;">
				<label>性别：</label>
				<select name="ddlroom" class="selcet-input sex" >
					<option selected="selected" value="0">男</option>
					<option value="1">女</option>
				</select>
			</div>
			<div class="t-main1-list" style="padding-top: 20px;">
				<label>联系电话：</label><input type="text" class="name-input mobile" style="margin-left: 1px;" />
			</div>
			<div class="t-main1-list" style="padding-top: 20px;">
				<label>服务密码：</label><input type="text" class="name-input password" style="margin-left: 1px;" />
			</div>
			<div class="t-main1-list" style="padding-top: 20px;" class="selcet-input" >
				<label>身份证号：</label><input type="text" class="name-input idcover" value="2000-09-27" style="margin-left: 1px;" />
			</div>
		</div>
		<div class="t-main1" style="padding-top: 20px;" >
			<span>信用信息</span>
			<div class="t-main1-list">
				<label>芝麻信用：</label><input type="text" class="name-input ant" placeholder="单位: ￥人民币"/>
			</div>
			<div class="t-main1-list" >
				<label>花呗额度：</label><input type="text" class="name-input tokio" placeholder="单位: ￥人民币"/>
			</div>
			<div class="t-main1-list" >
				<label>信用卡最高:</label><input type="text" class="name-input visa " placeholder="单位: ￥人民币"/>
			</div>
			<div class="t-main1-list" >
				<label>借贷宝已贷：</label><input type="text" class="name-input jdb" placeholder="单位: ￥人民币"/>
			</div>
		</div>
		<div class="subbtn">下一步</div></a>
	</body>

<script>

    $(function(){

        var name = localStorage.getItem('name');
        $(".name").val(name);

        var birthdate = localStorage.getItem("birthdate");
        $(".birthdate").val(birthdate);

        var sex = localStorage.getItem('sex');
        $('.sex').val(sex);

        var mobile = localStorage.getItem('mobile');
        $('.mobile').val(mobile);

        var password = localStorage.getItem('password');
        $('.password').val(password);

        var idcover = localStorage.getItem('idcover');
        $('.idcover').val(idcover);


        var ant = localStorage.getItem('ant');
        $('.ant').val(ant);

        var tokio = localStorage.getItem('tokio');
        $('.tokio').val(tokio);


        var visa = localStorage.getItem('visa');
        $('.visa').val(visa);

        var jdb = localStorage.getItem('jdb');
        $('.jdb').val(jdb);

    });

</script>
<script type="text/javascript" src="/layadmin/layui/layui.js"></script>
<script type="text/javascript" src="/layadmin/modul/home/index.js"></script>
</html>
