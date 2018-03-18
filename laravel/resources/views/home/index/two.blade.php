<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
	<title></title>
	<link href="/home/style.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="/home/js/jquery-1.7.1.min.js"></script>
</head>
<body>
<div class="t-top"><!--头部-->
	<a href="./one"><img src="/home/images/return.png"></a>
	<div onMouseOut="$('#t-nav').hide();" onMouseOver="$('#t-nav').show();">
		<span>我要贷款</span>
	</div>

</div><!--头部-->
<div class="t-main1">
	<span style="padding-top: 20px;">家庭信息</span>
	<div class="t-main2-list" style="padding-top: 20px;" class="selcet-input">
		<label>家庭住址：</label><input type="text" class="name-input home_address" />
	</div>
	<div class="t-main2-list" style="padding-top: 20px;" class="selcet-input">
		<label>现居地址：</label><input type="text" class="name-input now_address " />
	</div>
	<div class="t-main2-list" style="padding-top: 20px;" class="selcet-input">
		<label>微信号：</label><input type="text" class="name-input weixin" />
	</div>
	<div class="t-main2-list" style="padding-top: 20px;" class="selcet-input">
		<label>父亲电话：</label><input type="text" class="name-input father_mobile " />
	</div>
	<div class="t-main2-list" style="padding-top: 20px;" class="selcet-input">
		<label>母亲电话：</label><input type="text" class="name-input  mother_mobile" />
	</div>
	<div class="t-main2-list" style="padding-top: 20px;" class="selcet-input">
		<label>异性电话：</label><input type="text" class="name-input girlfriend_mobile " />
	</div>
	<div class="t-main2-list" style="padding-top: 20px;" >
		<label>外卖地址：</label><input type="text" class="name-input waimai " />
	</div>
	<div class="t-main2-list" style="padding-top: 20px;">
		<label>淘宝地址：</label><input type="text" class="name-input taobao " />
	</div>
</div>
<a ><div class="subbtn subbtntwo">下一步</div></a>


<script>

    $(function(){

        var home_address = localStorage.getItem('home_address');
        $(".home_address").val(home_address);

        var now_address = localStorage.getItem("now_address");
        $(".now_address").val(now_address);

        var weixin = localStorage.getItem('weixin');
        $('.weixin').val(weixin);

        var father_mobile = localStorage.getItem('father_mobile');
        $('.father_mobile').val(father_mobile);

        var mother_mobile = localStorage.getItem('mother_mobile');
        $('.mother_mobile').val(mother_mobile);

        var girlfriend_mobile = localStorage.getItem('girlfriend_mobile');
        $('.girlfriend_mobile').val(girlfriend_mobile);

        var waimai = localStorage.getItem('waimai');
        $('.waimai').val(waimai);

        var taobao = localStorage.getItem('taobao');
        $('.taobao').val(taobao);


    });




</script>
<script type="text/javascript" src="/layadmin/layui/layui.js"></script>
<script type="text/javascript" src="/layadmin/modul/home/two.js"></script>
</body>
</html>
