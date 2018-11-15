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
             <li class="is-active"> <a href="/">我的订单</a></li> 
             <li> <a href="/mycart">我的购物车</a></li> 
             <li> <a href="/mywish">我的收藏</a> </li> 
             <li> <a href="">账户信息</a> </li> 
             <li> <a href="">我的优惠信息</a> </li> 
            </ul> 
           </nav> 
           <div class="woocommerce-MyAccount-content">                 
            <div class="u-column1 col-1 woocommerce-Address addresses">
                <header class="woocommerce-Address-title title">
                  <h3>物流信息：</h3>中通快递
                </header>
                <header class="woocommerce-Address-title title">
                  <h3>收货地址：</h3>                
                </header> 
                <header class="woocommerce-Address-title title">
                  <h3>订单状态：</h3>已收货                
                </header> 
                <header class="woocommerce-Address-title title">
                  <h3>订单信息</h3>                
                </header>  
            </div>           
            
            <table class="table table-bordered">
              <tr class="active">
                <th><span class="col-xs-4">商品名</span><span class="col-xs-5">商品单价</span class=""><span>数量</span></th>                
                <th>付款总额</th>                                                       
              </tr>
              <tr>
                <td>
                  <table class="table">
                    <tr>
                      <td>商品名</td>
                      <td>单价</td>
                      <td>数量</td>  
                    </tr>
                    <tr>
                      <td>商品名</td>
                      <td>单价</td>
                      <td>数量</td>  
                    </tr>
                  </table>
                </td>                
                <td rowspan="2">付款总额</td>                
              </tr> 
                                    
            </table> 
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