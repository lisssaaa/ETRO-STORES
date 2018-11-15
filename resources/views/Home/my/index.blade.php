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
 @section('title','')
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
             <li> <a href="/mywish">我的收藏夹</a> </li> 
             <li> <a href="/myinfo">账户信息</a> </li> 
             <li> <a href="">我的优惠信息</a> </li> 
            </ul> 
           </nav> 
           <div class="woocommerce-MyAccount-content"> 
            <table class="table table-bordered">
              <tr>
                <th colspan="5" class="active">个人资料</th>                             
              </tr>
              <tr>
                <td><a href="">所有订单</a></td>
                <td>
                  <a href="">待付款</a>
                  <span class="badge">1</span>
                </td>
                <td>
                  <a href="">待发货</a>
                  <span class="badge">2</span>
                </td>
                <td>
                  <a href="">待收货</a>
                  <span class="badge">3</span>
                </td>
                <td>
                  <a href="">待评价</a>
                  <span class="badge">4</span>
                </td>
              </tr>              
            </table> 
            <br/>
             
            <div class="col-md-offset-8">
              <div class="input-group">               
                <input type="text" class="form-control" placeholder="输入商品名">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-default">搜索</button>
                </span>
              </div><!-- /input-group -->
            </div>    
            <table class="table">
              <tr class="active">
                <th class="col-md-5">
                  <span class="col-md-5">商品</span>
                  <span class="col-md-5">单价</span>
                  <span class="col-md-2">数量</span>
                </th>                
                <th class="col-md-2">付款总额</th>                 
                <th>订单状态</th>
                <th>   </th>                                          
              </tr>    
            </table>
            <br/>     
            <button type="submit" class="btn-xs btn-default">上一页</button>
            <button type="submit" class="btn-xs btn-default">1</button>
            <button type="submit" class="btn-xs btn-default">2</button>
            <button type="submit" class="btn-xs btn-default">下一页</button>            
            <br/>
            <table class="table table-bordered">                        
              <tr>
                <th colspan="8" class="active">订单号</th>                                           
              </tr>
              <tr>
                <td>
                  <table class="table">
                    <tr>
                      <td>商品名111</td>
                      <td>单价1</td>
                      <td>11</td>  
                    </tr>
                    <tr>
                      <td>商品名222</td>
                      <td>单价2</td>
                      <td>22</td>  
                    </tr>
                  </table>
                </td>                
                <td rowspan="2">付款总额</td>                
                <td rowspan="2">订单状态</td>
                <td rowspan="2">
                  <a href="/myaccount/1">查看详细信息></a>
                </td>
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