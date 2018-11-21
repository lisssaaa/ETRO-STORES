<?php 
	// function sendphone($p){
	// 	//载入ucpass类,此处不用调用直接实例化
	// 	// require_once('lib/Ucpaas.class.php');

	// 	//初始化必填
	// 	//填写在开发者控制台首页上的Account Sid
	// 	$options['accountsid']='b70ea9ba6c9bcef4e612f0219d88e902';
	// 	//填写在开发者控制台首页上的Auth Token
	// 	$options['token']='4adbb781143f7fabc344b8fdc0cd73c5';

	// 	//初始化 $options必填
	// 	$ucpass = new Ucpaas($options);

	// 	$appid = "b585a43d13f24a658640c9266b3a638e";	//应用的ID，可在开发者控制台内的短信产品下查看
	// 	//短信模板id
	// 	$templateid = "387033";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
	// 	//验证码
	// 	$param = rand(10000,99999); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
	// 	//手机号
	// 	$mobile = $p;
	// 	$uid = "";
	// 	//将验证码存入cookie中,过期时间与短信中时间一致
	// 	setcookie("params",$param,time()+60);

	// 	//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

	// 	echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
	// }

	function pay($data){
		/* *
		 * 功能：即时到账交易接口接入页
		 * 版本：3.4
		 * 修改日期：2016-03*08
		 * 说明：
		 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
		 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

		 *************************注意*****************
		 
		 *如果您在接口集成过程中遇到问题，可以按照下面的途径来解决
		 *1、开发文档中心（https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.KvddfJ&treeId=62&articleId=103740&docType=1）
		 *2、商户帮助中心（https://cshall.alipay.com/enterprise/help_detail.htm?help_id=473888）
		 *3、支持中心（https://support.open.alipay.com/alipay/support/index.htm）

		 *如果想使用扩展功能,请按文档要求,自行添加到parameter数组即可。
		 **********************************************
		 */

		require_once("alipay.config.php");
		require_once("lib/alipay_submit.class.php");

		/**************************请求参数**************************/
		        


				//商户订单号，商户网站订单系统中唯一订单号，必填
		        $out_trade_no = $data['order_num'];

		        //订单名称，必填
		        $subject = "ETRO STORES商城";

		        //付款金额，必填
		        // $total_fee = $data['m_price']*$data['num'];
		        $total_fee = "0.01";

		        //商品描述，可空
		        $body = "";

		        $url = sprintf($alipay_config['return_url'],$data['oid']);

		/************************************************************/

		//构造要请求的参数数组，无需改动
		$parameter = array(
				"service"       => $alipay_config['service'],
				"partner"       => $alipay_config['partner'],
				"seller_id"  => $alipay_config['seller_id'],
				"payment_type"	=> $alipay_config['payment_type'],
				"notify_url"	=> $alipay_config['notify_url'],
				"return_url"	=> $url,
				
				"anti_phishing_key"=>$alipay_config['anti_phishing_key'],
				"exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
				"out_trade_no"	=> $out_trade_no,
				"subject"	=> $subject,
				"total_fee"	=> $total_fee,
				"body"	=> $body,
				"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
				//其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
		        //如"参数名"=>"参数值"
				
		);

		//建立请求
		$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;

	}
?>