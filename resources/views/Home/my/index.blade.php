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
  <style>
      .status{
        text-align: center;
        cursor:pointer;
      }
      .on{
        background-color:#f2f2f2;
      }
      .act{
        background-color: #e6e6e6;
      }

    .img{width: 120px;
          height: 120px;
          position: relative;
          left: 10px;
          background: white;
          background-clip: padding-box;
          
          background-size:cover;
          display: block;
          border-radius: 50%;
          -webkit-border-radius:60px;
          -moz-border-radius:60px;
          align-items: center;
          justify-content: center;
          overflow: hidden;}
  
  </style>
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
             <li class="is-active"> <a href="/myaccount">我的订单</a></li> 
             <li> <a href="/mycart">我的购物车</a></li> 
             <li> <a href="/mywish">我的收藏夹</a> </li> 
             <li id="set"> 
              <a href="javascript:void(0)">设置</a>          
             </li> 
             <li style="display:none"> <a href="/myaccount/{{$user->id}}/edit">个人资料</a> </li> 
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
            <table class="table table-bordered">
              <tr>
                <th class="col-md-2 active">
                      @if($user->pic)
                      <img class="img" src="/uploads/users/{{$user->pic}}" alt="">
                      @else
                      <img class="img" data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY3MjEwYjMzYjAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjcyMTBiMzNiMCI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OS41NTQ2ODc1IiB5PSI5NC41Ij4xNzF4MTgwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true">
                      @endif
                </th> 
                <th colspan="5" class="active" style="line-height:40px">                      
                    <a>{{$user->username}}</a><br/>
                    @if($user->phone) <a>{{$user->phone}}</a><br/> @else <a href="" style="color:orange">去设置手机号码>></a><br/> @endif 
                    @if($user->email) <a>{{$user->email}}</a> @else <a href="" style="color:orange">去设置邮箱>></a> @endif 
                </th>                                                         
              </tr>
              <!-- <tr>
                <th colspan="5" class="active"> 
                    <a>{{$user->email}}</a>
                </th>    
              </tr> -->
              <tr class="col-md-12 tr">
                <td class="act"><div class="status" onclick="status(this,5)">所有订单</div></td>
                <td>
                  <div class="status" onclick="status(this,0)">
                    待付款
                    @if($num[0]!=0) 
                    <span class="badge" style="background-color:orange">{{$num[0]}}</span>
                    @endif
                </div>
                </td>
                <td>
                  <div class="status" onclick="status(this,1)">
                    待发货
                    @if($num[1]!=0) 
                    <span class="badge" style="background-color:orange">{{$num[1]}}</span>
                    @endif
                    </div>
                </td>
                <td>
                  <div class="status" onclick="status(this,2)">
                    待收货
                    @if($num[2]!=0) 
                    <span class="badge" style="background-color:orange">{{$num[2]}}</span>
                    @endif
                  </div>
                </td>
                <td>
                  <div class="status" onclick="status(this,3)">
                    待评价
                    @if($num[3]!=0) 
                    <span class="badge" style="background-color:orange">{{$num[3]}}</span>
                    @endif
                  </div>
                </td>
                <td>
                  <div class="status" onclick="status(this,4)">
                    已完成
                    @if($num[4]!=0) 
                    <span class="badge" style="background-color:orange">{{$num[4]}}</span>
                    @endif
                  </div>
                </td>
              </tr>              
            </table> 
            <script>
              //鼠标悬停
              $('.tr td').hover(function(){
                $(this).addClass('on');
                $(this).siblings().removeClass('on');
              });
              //切换状态
              function status(t,i){
                //设置选中css效果
                $(t).parent().addClass('act');
                $(t).parent().siblings().removeClass('act');
                $.get('/myaccount',{i:i},function(data){
                  // alert(data);
                  // $('.ajax').empty();
                  $('.ajax').replaceWith(data);                  
                });
              }
              //分页，并设置样式
              $('#page').children('button').eq(0).attr('class','btn btn-warning');
              function page(t,p){
                //ajax请求数据
                $.get('/adminorder',{page:p},function(data){
                  // alert(data);
                  $('.table').html(data);
                  $(t).attr('class','btn btn-warning');
                  $(t).siblings().attr('class','btn btn-default');
                });                
              }    
            </script>
            <br/>             
            
            <table class="table">
              <tr class="active">
                <th class="col-md-6">
                  <span class="col-md-offset-3">商品</span>
                  <span class="col-md-offset-5">单价</span>
                  <span class="col-md-offset-1">数量</span>
                </th>                
                <th class="col-md-1">付款总额</th>                 
                <th class="col-md-1">订单状态</th>
                <th class="col-md-2"></th>                                          
              </tr>    
            </table>
            <br/>

            <table class="table table-bordered ajax">
            @if($orders)
            @foreach($orders as $value)                        
              <tr>
                <th colspan="8" class="active order" id="">订单号：{{$value['order_num']}}</th>                                           
              </tr>
              <tr>                
                <td>
                  <table class="table table-hover">
                    @foreach($value['goods'] as $v)
                    <tr>
                      <td><img src="/uploads/goods/{{$v['gpic']}}" width="40px" alt=""></td>
                      <td>{{$v['gname']}}</td>
                      <td>{{$v['gprice']}}</td>
                      <td>{{$v['num']}}</td>  
                    </tr> 
                    @endforeach                      
                  </table>                  
                </td>                             
                <td rowspan="2">￥{{$value['total']}}</td>                
                <td rowspan="2">
                  @if($value['status']==0)
                  <span style="color:red">待付款</span>
                  @elseif($value['status']==1)
                  <span style="color:orange">待发货</span>
                  @elseif($value['status']==2)
                  <span style="color:blue">待收货</span>
                  @elseif($value['status']==3)
                  <span style="color:yellow">待评价</span>
                  @else
                  <span style="color:green">订单完成<span>
                  @endif
                </td>
                <td rowspan="2">
                  <a href="/myaccount/{{$value['id']}}">查看详细信息></a>
                </td>
              </tr> 
              @endforeach
              @else
              <tr><td style="text-align:center">暂无数据！</td></tr>  
              @endif                   
            </table> 
            <script>
              //遍历每一个订单的id
              
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