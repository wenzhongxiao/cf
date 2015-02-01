<?php
	define('__SITE__', 'http://'.$_SERVER['HTTP_HOST'].'/cf')
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="祈福新邨外线巴士时刻表">
		<title>祈福新邨</title>

		<!-- Bootstrap -->
		<link href="./static/css/bootstrap.min.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Favicons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="./static/icon/apple-touch-icon-144-precomposed.png">
	<style type="text/css">
		body{padding-top: 10px;}
	</style>
	</head>
<body>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<article>
				<p><strong>祈福-海珠广场</strong></p>
				<p class="text-muted">祈福新邨至海珠广场大巴，单程40分钟，票价8元。</p>
				</article>
			</div>
			<div id="list-container">
				<p class="help-block text-center">数据加载中...</p>
			</div>
			<hr>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<p><strong>途径地点：（祈福 至 海珠广场）</strong></p>
						<p>祈福新村总站<br>
						珠影站（客村地铁A出口）<br>
						荣军医院（新港西路）<br>
						美院（昌岗东路257号）<br>
						江南大道中（市二宫地铁C出口对面）<br>
						海珠广场（地铁站D出口左转20米）
						</p>
					</div>
					<div class="col-sm-6">
						<p><strong>途径地点：（海珠广场 至 祈福）</strong></p>
						<p>海珠广场（地铁站D出口左转20米）<br>
						江南大道中(市二宫地铁E出口建设银行入口)<br>
						江南西（海员宾馆左侧）<br>
						广医二院<br>
						荣军医院<br>
						珠影站（客村地铁C出口）<br>
						祈福新村总站</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>vsersion 1.0</div>
<img src="<?php echo __SITE__; ?>/attachment/cf-01.png" width="0" height="0" style="overflow:hidden;">
<!-- date list template -->
<script type="text/template" id="tpl-date">
<div class="panel-body">
	<div class="row">
		<div class="col-sm-6">
			<p><strong>周一至周五 / Monday To Tuesday </strong></p>
			<hr>
			<ul class="list-unstyled list-inline list-xs">
			<% _.each(data.weekday,function(t){ %>
				<li><%=t%></li>
			<% }); %>
			</ul>
		</div>
		<div class="col-sm-6">
			<p><strong>周六、周日及节假日 / Saturday, Sunday, Festivals</strong></p>
			<hr>
			<ul class="list-unstyled list-inline list-xs">
			<% _.each(data.weekend,function(t){ %>
				<li><%=t%></li>
			<% }); %>
			</ul>
		</div>
	</div>
</div>

</script>
<!-- Load JS -->
<script type="text/javascript" src="./static/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="./static/js/underscore-1.6.0.min.js"></script>

<!-- Get Data -->
<script type="text/javascript">
	var tpl_id = "#tpl-date"; //模板ID
	var ele_id = "#list-container"; //容器ID
	var api_url = './static/json/cf-haizhuguangchang.json'; //接口地址

	$(document).ready(function(){
		getHzgc(api_url,tpl_id,ele_id); //加载数据
	});

	//Get data and insert into DOM
	function getHzgc(api,tpl,ele){
		var jqXHR = $.getJSON(api,function(result){
			var template = _.template($(tpl).html());
			var html = template({data:result.data});
			$(ele).html(html);
		});
	}
</script>

</body>
</html>
