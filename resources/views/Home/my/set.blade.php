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
    .img{width: 150px;
          height: 150px;
          position: relative;
          left: 30px;
          background: white;
          background-clip: padding-box;
          border: solid 5px #ffd9b3;
          background-size:cover;
          display: block;
          border-radius: 50%;
          -webkit-border-radius:75px;
          -moz-border-radius:75px;
          align-items: center;
          justify-content: center;
          overflow: hidden;}
  </style> 
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
             <li> <a href="/myaccount">我的订单</a></li> 
             <li> <a href="/mycart">我的购物车</a></li> 
             <li> <a href="/mywish">我的收藏夹</a> </li> 
             <li id="set"> <a href="javascript:void(0)">设置</a> </li> 
             <li class="is-active"> <a href="/myaccount/{{$info->uid}}/edit">个人资料</a> </li> 
             <li> <a href="/myaddress">收货地址</a> </li>
             <li> <a href="">账户安全</a> </li> 
            </ul> 
           </nav>
           <script>
              $('#set').click(function(){
                $(this).nextAll('li').toggle();
              });
           </script>  
           <div class="woocommerce-MyAccount-content">                 
            <div class="u-column1 col-1 woocommerce-Address addresses">

              <form class="edit-account" action="/myaccount/{{$info->uid}}" method="post" enctype="multipart/form-data"> 
                {{method_field('PUT')}}
                {{csrf_field()}}
              <p class="form-row form-row-first">
                <label for="account_first_name"> 头像 <span class="required">*</span> </label> 
               
                 
                    @if($info->pic)
                    <img class="img" src="/uploads/users/{{$info->pic}}" alt="">
                    @else
                    <img class="img" data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY3MjEwYjMzYjAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjcyMTBiMzNiMCI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OS41NTQ2ODc1IiB5PSI5NC41Ij4xNzF4MTgwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true">
                    @endif
                                  
                 
                <div class="clear"></div>               
                <input type="file" name="pic"> 
              </p> 
              <div class="clear"></div> 
              <p class="form-row form-row-first"> 
                <label for="account_first_name"> 真实姓名 <span class="required">*</span> </label>
                <input type="text" class="input-text" name="name" value="{{$info->name}}"> 
              </p> 
              <p class="form-row form-row-last"> 
                <label for="account_last_name"> 性别 <span class="required">*</span> </label> 
                <input type="text" class="input-text" name="sex" value="{{$info->sex}}"> 
              </p> 
              <div class="clear"></div> 
              <p class="form-row form-row-wide"> 
                <label for="account_email"> 出生年月 <span class="required">*</span> </label> 
                <input type="date" class="input-text" name="birthday" value="{{$info->birthday}}"> 
              </p>               
              <div class="clear"></div> 
              <p> <input type="submit" class="button" value="保存"> </p> 
             </form>
               
            </div>
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