<?php
	//获取缓存订单id
	$redis = new Redis();
	$redis->connect('localhost',6379);
	$order_id = $redis->get('movie_orderid:');
	//改变订单为已付款状态
	$static = 0;
	//设置付款时间为当前时间
	$buy_time = time();

	//修改数据库数据
	
	$pdo = new PDO("mysql:host=localhost;dbname=movie;charset=utf8","root","zhulisha");
	$sql = "UPDATE morder SET static='{$static}',buy_time='{$buy_time}' WHERE id={$order_id}";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

?>
<div style="width:100%;height:50px;float:center;background-color:green">支付成功！</div>