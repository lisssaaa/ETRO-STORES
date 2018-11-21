<!DOCTYPE html>
<html lang="en">
 <head> 
  <title>My Account</title> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <!-- GOOGLE WEB FONTS --> 
  <link rel="stylesheet" href="/static/home/css/font-awesome.min.css" /> 
  <!-- BOOTSTRAP 3.3.7 CSS --> 
  <link rel="stylesheet" href="/static/home/css/bootstrap.min.css" /> 
  <!-- SLICK v1.6.0 CSS --> 
  <link rel="stylesheet" href="/static/home/css/slick-1.6.0/slick.css" /> 
  <link rel="stylesheet" href="/static/home/css/jquery.fancybox.css" /> 
  <link rel="stylesheet" href="/static/home/css/yith-woocommerce-compare/colorbox.css" /> 
  <link rel="stylesheet" href="/static/home/css/owl-carousel/owl.carousel.min.css" /> 
  <link rel="stylesheet" href="/static/home/css/owl-carousel/owl.theme.default.min.css" /> 
  <link rel="stylesheet" href="/static/home/css/js_composer/js_composer.min.css" /> 
  <link rel="stylesheet" href="/static/home/css/woocommerce/woocommerce.css" /> 
  <link rel="stylesheet" href="/static/home/css/yith-woocommerce-wishlist/style.css" /> 
  <link rel="stylesheet" href="/static/home/css/custom.css" /> 
  <link rel="stylesheet" href="/static/home/css/app-orange.css" id="theme_color" /> 
  <link rel="stylesheet" href="" id="rtl" /> 
  <link rel="stylesheet" href="/static/home/css/app-responsive.css" /> 
 </head> 
 <body class="page woocommerce-account woocommerce-page"> 
 @extends('Home.public') 
 @section('location','个人中心')
 @section('title','我的')
 @section('content')
   <div class="container"> 
    <div class="row"> 
     <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
      <div class="post-6 page type-page status-publish hentry"> 
       <div class="entry"> 
        <div class="entry-content"> 
         <header> 
          <h2 class="entry-title">个人中心</h2> 
         </header> 
         <div class="entry-content"> 
          <div class="woocommerce"> 
           <nav class="woocommerce-MyAccount-navigation"> 
            <ul> 
             <li class="is-active"> <a href="/myaccount">我的订单</a></li> 
             <li> <a href="/mycart">我的购物车</a></li> 
             <li> <a href="/mywish">我的收藏夹</a> </li> 
             <li id="set"> <a href="javascript:void(0)">设置</a> </li> 
             <li style="display:none"> <a href="/myaccount/{{$uid}}/edit">个人资料</a> </li> 
             <li style="display:none"> <a href="/myaddress">收货地址</a> </li>
             <li style="display:none"> <a href="">账户安全</a> </li> 
            </ul> 
           </nav>
           <script>
              $('#set').click(function(){
                $(this).nextAll('li').toggle();
              });
           </script>  
           <div class="woocommerce-MyAccount-content">                 
            <div class="u-column1 col-1 woocommerce-Address addresses">
              <table class="table">
                <tr>
                  <td class="col-md-12"><h4>物流信息：中通快递</h4></td>
                <tr>
                  <td class="col-md-12">
                    <h4>收货地址：
                     {{$info['address']->name}}&nbsp;{{$info['address']->phone}}<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$info['address']->adds}}</h4>
                  </td>
                </tr>
                <tr>
                  <td class="col-md-12"><h4>订单状态：
                      @if($info['status']==0)
                      <span style="color:red">待付款</span>
                      @elseif($info['status']==1)
                      <span style="color:orange">待发货</span>
                      @elseif($info['status']==2)
                      <span style="color:blue">待收货</span>
                      @elseif($info['status']==3)
                      <span style="color:yellow">待评价</span>
                      @else
                      <span style="color:green">订单完成<span>
                      @endif                
                  </h4></td>
                </tr>
                <tr>
                  <td class="col-md-12"><h4>订单信息：</h4></td>
                </tr>                
              </table>
               
            </div>          
            
            <table class="table table-bordered">
              <tr class="active">
                <th class="col-md-10">
                  <span class="col-md-offset-3">商品</span>
                  <span class="col-md-offset-5">单价</span>
                  <span class="col-md-offset-2">数量</span>
                </th>                
                <th>付款总额</th>                                                       
              </tr>
              <tr>
                <td>
                  <table class="table">
                    @foreach($info['goods'] as $v)
                    <tr>
                      <td><img src="/uploads/goods/{{$v['gpic']}}" width="40px" alt=""></td>
                      <td>{{$v['gname']}}</td>
                      <td>{{$v['gprice']}}</td>
                      <td>{{$v['num']}}</td>
                    </tr>
                    @endforeach                    
                  </table>
                </td>                
                <td rowspan="2">￥{{$info['total']}}</td>                
              </tr>                                     
            </table>
            <div style="float:right">
              <a href="/myaccount" class="btn btn-default">返回</a>
              @if($info['status'] == 0)
              <button onclick="cancel({{$info['id']}})" class="btn btn-warning">取消订单</button>
              <a href="/pay?oid={{$info['id']}}" class="btn btn-danger">去付款</a>
              @elseif($info['status'] == 1) 
              <a href="/myaccount" class="btn btn-warning">提醒发货</a>
              @elseif($info['status'] == 2) 
              <a href="/myaccount" class="btn btn-default">查看物流</a>
              <a href="/confirm/{{$info['id']}}" class="btn btn-warning">确认收货</a>
              @elseif($info['status'] == 3) 
              <a href="/myaccount" class="btn btn-warning">去评价</a>
              @endif
            </div>

            <script>
                function cancel(oid){
                  if(confirm('您确定要取消订单？')){
                    $.get("/shop/"+oid+"/edit",function(data){
                      if(data==0){
                        location.href = "http://www.project.com/myaccount";
                      }
                    });
                  }
                }
            </script>
           </div> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
   @endsection 
 </body>
</html>