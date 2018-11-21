<!DOCTYPE html>
<html lang="en">
 <head> 
  <title>Home</title> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <!-- GOOGLE WEB FONTS --> 
  <link rel="stylesheet" href="/static/home/css/font-awesome.min.css" /> 
  <!-- BOOTSTRAP 3.3.7 /static/home/css --> 
  <link rel="stylesheet" href="/static/home/css/bootstrap.min.css" /> 
  <!-- SLICK v1.6.0 /static/home/css --> 
  <link rel="stylesheet" href="/static/home/css/slick-1.6.0/slick.css" /> 
  <link rel="stylesheet" href="/static/home/css/jquery.fancybox.css" /> 
  <link rel="stylesheet" href="/static/home/css/yith-woocommerce-compare/colorbox.css" /> 
  <link rel="stylesheet" href="/static/home/css/owl-carousel/owl.carousel.min.css" /> 
  <link rel="stylesheet" href="/static/home/css/owl-carousel/owl.theme.default.min.css" /> 
  <link rel="stylesheet" href="/static/home/css/js_composer/js_composer.min.css" /> 
  <link rel="stylesheet" href="/static/home/css/woocommerce/woocommerce.css" /> 
  <link rel="stylesheet" href="/static/home/css/yith-woocommerce-wishlist/style.css" /> 
  <link rel="stylesheet" href="/static/home/css/yith-woocommerce-wishlist/style.css" /> 
  <link rel="stylesheet" href="/static/home/css/custom.css" /> 
  <link rel="stylesheet" href="/static/home/css/app-orange.css" id="theme_color" /> 
  <link rel="stylesheet" href="" id="rtl" /> 
  <link rel="stylesheet" href="/static/home/css/app-responsive.css" />
  <script type="text/javascript" src="/static/home/js/jquery/jquery.min.js"></script>
  <style>
    .imgg{width: 16px;
          height: 16px;
          position: relative;
          left: 0px;
          background: white;
          background-clip: padding-box;
          /*border: solid 5px #ffd9b3;*/
          background-size:cover;
          display: block;
          border-radius: 50%;
          -webkit-border-radius:8px;
          -moz-border-radius:8px;
          align-items: center;
          justify-content: center;
          overflow: hidden;}
  </style> 
 </head> 
 <body class="page page-id-6 home-style1"> 
  <div class="body-wrapper theme-clearfix"> 
   <header id="header" class="header header-style1"> 
    <div class="header-top clearfix"> 
     <div class="container"> 
      <div class="rows"> 
       <!-- SIDEBAR TOP MENU --> 
       <div class="pull-left top1"> 
        <div class="widget text-2 widget_text pull-left"> 
         <div class="widget-inner"> 
          <div class="textwidget"> 
           <div class="call-us">
            <span>联系我们: </span>18992336498
           </div> 
          </div> 
         </div> 
        </div> 
        <div class="widget text-3 widget_text pull-left"> 
         <div class="widget-inner"> 
          <div class="textwidget"> 
           <div id="lang_sel"> 
            <ul class="nav"> 
             <li> <a class="lang_sel_sel icl-en"> <img class="iclflag" title="English" alt="en" src="/static/home/images/icons/en.png" width="18" height="12" /> English </a> 
              <ul> 
               <li class="icl-en"> <a href="#"> <img class="iclflag" title="English" alt="en" src="/static/home/images/icons/en.png" width="18" height="12" /> English </a> </li> 
               <li class="icl-ar"> <a href="#"> <img class="iclflag" title="Arabic" alt="ar" src="/static/home/images/icons/ar.png" width="18" height="12" /> Arabic </a> </li> 
              </ul> </li> 
            </ul> 
           </div> 
          </div> 
         </div> 
        </div> 
        <div class="widget woocommerce_currency_converter-2 widget_currency_converter pull-left"> 
         <div class="widget-inner"> 
          <form method="post" class="currency_converter" action=""> 
           <ul class="currency_w"> 
            <li> <a href="#" class="">USD</a> 
             <ul class="currency_switcher"> 
              <li><a href="#" class="reset default active" data-currencycode="USD">USD</a></li> 
              <li><a href="#" class="" data-currencycode="EUR">EUR</a></li> 
             </ul> </li> 
           </ul> 
          </form> 
         </div> 
        </div> 
       </div> 
       <div class="wrap-myacc pull-right"> 
        <div class="sidebar-account pull-left"> 
         <!-- <div class="account-title">
          Lisa
         </div>  -->
         <!-- <div id="my-account" class="my-account"> 
          <div class="widget-1 widget-first widget nav_menu-4 widget_nav_menu"> 
           <div class="widget-inner"> 
            <ul id="menu-my-account" class="menu"> 
             <li class="menu-my-account"> <a class="item-link" href="/myaccount"> <span class="menu-title">个人中心</span> </a> </li> 
             <li class="menu-cart"> <a class="item-link" href="/mycart"> <span class="menu-title">购物车</span> </a> </li>
             <li class="menu-wishlist"> <a class="item-link" href="/wishlist"> <span class="menu-title">收藏夹</span> </a> </li> 
            </ul> 
           </div> 
          </div>           
         </div> 
        </div>  -->
        <div class="pull-left top2"> 
         <div class="widget-1 widget-first widget nav_menu-2 widget_nav_menu"> 
          <div class="widget-inner"> 
           <ul id="menu-checkout" class="menu">
           @if(session('home'))           
            <li> <a href="/myaccount/{{$u['uid']}}/edit"> 
              @if($u['pic'])
              <img class="imgg" src="/uploads/users/{{$u['pic']}}" alt=""> 
              @else
              <img class="imgg" data-src="holder.js/100%x180" alt="100%x180" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY3MjEwYjMzYjAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjcyMTBiMzNiMCI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OS41NTQ2ODc1IiB5PSI5NC41Ij4xNzF4MTgwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true">
              @endif
            </a></li>  
            <li> <a href="/myaccount"> <span>{{session('home')}}</span> </a></li>            
            <li class="menu-checkout"> <a class="item-link" href="/login/create"> <span class="menu-title">注销</span> </a> </li> 
           @else
           <li> <a href="javascript:void(0);" data-toggle="modal" data-target="#login_form"> <span>登录</span> </a>  </li> 
           @endif
           </ul> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
    <div class="header-mid clearfix"> 
     <div class="container"> 
      <div class="rows"> 
       <!-- LOGO --> 
       <div class="etrostore-logo pull-left"> 
        <a href="/"> <img src="/static/home/images/icons/logo-orange.png" alt="Shoopy" /> </a> 
       </div> 
       <div class="mid-header pull-right"> 
        <div class="widget-1 widget-first widget sw_top-2 sw_top"> 
         <div class="widget-inner"> 
          <div class="top-form top-search"> 
           <div class="topsearch-entry"> 
            <form method="get" action=""> 
             <div> 
              <input type="text" value="" name="s" placeholder="请输入商品关键字" /> 
              <!-- <div class="cat-wrapper"> 
               <label class="label-search"> <select name="search_category" class="s1_option"> <option value="">所有分类</option> <option value="8">Computers &amp; Laptops</option> <option value="13">Computers &amp; Networking</option> <option value="14">Smartphones &amp; Tablet</option> <option value="15">Home Furniture</option> <option value="16">Home Appliances</option> <option value="17">Electronic Component</option> <option value="18">Household Goods</option> <option value="32">Appliances</option> <option value="49">Accessories</option> <option value="51">Electronics</option> <option value="78">Televisions</option> <option value="80">Cameras &amp; Accessories</option> </select> </label> 
              </div>  -->
              <button type="submit" title="Search" class="fa fa-search button-search-pro form-button"></button> 
             </div> 
            </form> 
           </div> 
          </div> 
         </div> 
        </div> 
        @if(session('home'))
        <div class="widget sw_top-3 sw_top pull-left"> 
         <div class="widget-inner"> 
          <div class="top-form top-form-minicart etrostore-minicart pull-right"> 
           <div class="top-minicart-icon pull-right"> 
            <i class="fa fa-shopping-cart"></i> 
            @if($u['count']!=0) 
            <a class="cart-contents" href="cart.html" title="View your shopping cart"> <span class="minicart-number">{{$u['count']}}</span> </a>
            @endif 
           </div> 
           <!-- 头部购物车 -->
           <div class="wrapp-minicart"> 
            <div class="minicart-padding"> 
             <div class="number-item">                
              <span>购物车</span> 
             </div> 
             <ul class="minicart-content">
             @if($u['goods'] != 0)
             @foreach($u['goods'] as $value) 
              <li> <a href="simple_product.html" class="product-image"> <img width="100" height="100" src="/uploads/goods/{{$value['pic']}}" class="attachment-100x100 size-100x100 wp-post-image" alt=""  sizes="(max-width: 100px) 100vw, 100px" /> </a> 
               <div class="detail-item"> 
                <div class="product-details"> 
                 <h4> <a class="title-item" href="simple_product.html">{{$value['name']}}</a> </h4> 
                 <div class="product-price"> 
                  <span class="price"> <span class="woocommerce-Price-amount amount"> <span class="woocommerce-Price-currencySymbol">￥</span>{{$value['price']}}</span> </span> 
                  <div class="qty"> 
                   <span class="qty-number">{{$value['num']}}</span> 
                  </div> 
                 </div> 
                 <div class="product-action clearfix"> 
                  <form action="/mycart/{{$value['id']}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn-remove"><span class="fa fa-trash-o"></span></button>                
                  </form>
                  <!-- <a href="#" class="btn-remove" title="Remove this item"> <span class="fa fa-trash-o"></span> </a>  -->
                  <!-- <a class="btn-edit" href="cart.html" title="View your shopping cart"> <span class="fa fa-pencil"></span> </a>  -->
                 </div> 
                </div> 
               </div>
              </li> 
              <?php $u['total']+=$value['price']*$value['num'] ?>
              
              @endforeach
              @else
              <li>购物车为空！</li>
              @endif             
             </ul> 
             <div class="cart-checkout"> 
              <div class="price-total"> 
               <span class="label-price-total">总计</span> 
               <span class="price-total-w"> <span class="price"> <span class="woocommerce-Price-amount amount"> <span class="woocommerce-Price-currencySymbol">￥</span>{{$u['total']}}</span> </span> </span> 
              </div> 
              <div class="cart-links clearfix"> 
               <div class="cart-link"> 
                <a href="/mycart" title="Cart">去购物车</a> 
               </div> 
               <div class="checkout-link"> 
                <a href="/shop/create" title="Check Out">去结算</a> 
               </div> 
              </div> 
             </div> 
            </div> 
           </div>
           <!-- 购物车结束  -->
          </div> 
         </div> 
        </div> 
        <div class="widget nav_menu-3 widget_nav_menu pull-left"> 
         <div class="widget-inner"> 
          <ul id="menu-wishlist" class="menu"> 
           <li class="menu-wishlist"> <a class="item-link" href="/mywish"> <span class="menu-title">Wishlist</span> </a> </li> 
           <!-- <li class="yith-woocompare-open menu-compare"> <a class="item-link compare" href="#"> <span class="menu-title">Compare</span> </a> </li>  -->
          </ul> 
         </div> 
        </div>
        @endif 
       </div> 
      </div> 
     </div> 
    </div> 
    <div class="header-bottom clearfix"> 
     <div class="container"> 
      <div class="rows"> 
       
     </div> 
    </div> 
   </header> 

   <div class="listings-title"> 
    <div class="container"> 
     <div class="wrap-title"> 
      <h1>@yield('this')</h1> 
      <div class="bread"> 
       <div class="breadcrumbs theme-clearfix"> 
        <div class="container"> 
         <ul class="breadcrumb"> 
          <li> <a href="#">@yield('location')</a> <span class="go-page"></span> </li> 
          <li class="active"> <span>@yield('title')</span> </li> 
         </ul> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
    @section('content')
    @show
   <!-- 尾部 -->
   <footer id="footer" class="footer default theme-clearfix"> 
    <!-- Content footer --> 
    <div class="container"> 
     <div class="vc_row wpb_row vc_row-fluid"> 
      <div class="wpb_column vc_column_container vc_col-sm-12"> 
      
      </div> 
     </div> 
     <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid footer-style1 vc_row-no-padding"> 
      <div class="container float wpb_column vc_column_container vc_col-sm-12"> 
       <div class="vc_column-inner "> 
        <div class="wpb_wrapper">         
         <div class="vc_row wpb_row vc_inner vc_row-fluid footer-bottom"> 
          <div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12"> 
           <div class="vc_column-inner "> 
            <div class="wpb_wrapper"> 
             <div class="wpb_text_column wpb_content_element "> 
              <div class="wpb_wrapper"> 
               <div class="ya-logo"> 
                <a href="#"> <img src="/static/home/images/icons/logo-footer.png" alt="logo" /> </a> 
               </div> 
              </div> 
             </div> 
             <div class="wpb_raw_code wpb_content_element wpb_raw_html"> 
              <div class="wpb_wrapper"> 
               <div class="infomation"> 
                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p> 
                <div class="info-support"> 
                 <ul> 
                  <li>No 1123, Marmora Road, Glasgow, D04 89GR.</li> 
                  <li>(801) 2345 - 6788 / (801) 2345 - 6789</li> 
                  <li><a href="mailto:contact@etrostore.com">support@etrostore.com</a></li> 
                 </ul> 
                </div> 
                <div class="store"> 
                 <a href="#"> <img src="/static/home/images/1903/app-store.png" alt="store" title="store" /> </a> 
                 <a href="#"> <img src="/static/home/images/1903/google-store.png" alt="store" title="store" /> </a> 
                </div> 
               </div> 
              </div> 
             </div> 
            </div> 
           </div> 
          </div> 
          <div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-2 vc_col-md-2 vc_col-xs-12"> 
           <div class="vc_column-inner "> 
            <div class="wpb_wrapper"> 
             <div class="vc_wp_custommenu wpb_content_element"> 
              <div class="widget widget_nav_menu"> 
               <h2 class="widgettitle">Support</h2> 
               <ul id="menu-support" class="menu"> 
                <li class="menu-product-support"> <a class="item-link" href="#"> <span class="menu-title">Product Support</span> </a> </li> 
                <li class="menu-pc-setup-support-services"> <a class="item-link" href="#"> <span class="menu-title">PC Setup &amp; Support Services</span> </a> </li> 
                <li class="menu-extended-service-plans"> <a class="item-link" href="#"> <span class="menu-title">Extended Service Plans</span> </a> </li> 
                <li class="menu-community"> <a class="item-link" href="#"> <span class="menu-title">Community</span> </a> </li> 
                <li class="menu-product-manuals"> <a class="item-link" href="#"> <span class="menu-title">Product Manuals</span> </a> </li> 
                <li class="menu-product-registration"> <a class="item-link" href="#"> <span class="menu-title">Product Registration</span> </a> </li> 
               </ul> 
              </div> 
             </div> 
            </div> 
           </div> 
          </div> 
          <div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-2 vc_col-md-2 vc_col-xs-12"> 
           <div class="vc_column-inner "> 
            <div class="wpb_wrapper"> 
             <div class="vc_wp_custommenu wpb_content_element"> 
              <div class="widget widget_nav_menu"> 
               <h2 class="widgettitle">Your Links</h2> 
               <ul id="menu-your-links" class="menu"> 
                <li class="menu-my-account"> <a class="item-link" href="my_account.html"> <span class="menu-title">My Account</span> </a> </li> 
                <li class="menu-order-tracking"> <a class="item-link" href="#"> <span class="menu-title">Order Tracking</span> </a> </li> 
                <li class="menu-watch-list"> <a class="item-link" href="#"> <span class="menu-title">Watch List</span> </a> </li> 
                <li class="menu-customer-service"> <a class="item-link" href="#"> <span class="menu-title">Customer Service</span> </a> </li> 
                <li class="menu-returns-exchanges"> <a class="item-link" href="#"> <span class="menu-title">Returns / Exchanges</span> </a> </li> 
                <li class="menu-faqs"> <a class="item-link" href="#"> <span class="menu-title">FAQs</span> </a> </li> 
                <li class="menu-financing"> <a class="item-link" href="#"> <span class="menu-title">Financing</span> </a> </li> 
                <li class="menu-card"> <a class="item-link" href="#"> <span class="menu-title">Card</span> </a> </li> 
               </ul> 
              </div> 
             </div> 
            </div> 
           </div> 
          </div> 
          <div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12"> 
           <div class="vc_column-inner "> 
            <div class="wpb_wrapper"> 
             <div class="wpb_raw_code wpb_content_element wpb_raw_html"> 
              <div class="wpb_wrapper"> 
               <div class="sp-map"> 
                <div class="title"> 
                 <h2>find a store</h2> 
                </div> 
                <img src="/static/home/images/1903/map.jpg" alt="map" title="map" /> 
                <a href="#" class="link-map">Store locator</a> 
               </div> 
              </div> 
             </div> 
            </div> 
           </div> 
          </div> 
         </div> 
         <div class="vc_wp_custommenu wpb_content_element wrap-cus"> 
          <div class="widget widget_nav_menu"> 
           <ul id="menu-infomation" class="menu"> 
            <li class="menu-about-us"> <a class="item-link" href="about_us.html"> <span class="menu-title">About Us</span> </a> </li> 
            <li class="menu-customer-service"> <a class="item-link" href="#"> <span class="menu-title">Customer Service</span> </a> </li> 
            <li class="menu-privacy-policy"> <a class="item-link" href="#"> <span class="menu-title">Privacy Policy</span> </a> </li> 
            <li class="menu-site-map"> <a class="item-link" href="#"> <span class="menu-title">Site Map</span> </a> </li> 
            <li class="menu-orders-and-returns"> <a class="item-link" href="#"> <span class="menu-title">Orders and Returns</span> </a> </li> 
            <li class="menu-contact-us"> <a class="item-link" href="contact_us.html"> <span class="menu-title">Contact Us</span> </a> </li> 
           </ul> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="vc_row-full-width vc_clearfix"></div> 
    </div> 
   </footer> 
  </div> 
  <!-- DIALOGS --> 
  <div class="modal fade" id="search_form" tabhome="-1" role="dialog" aria-hidden="true"> 
   <div class="modal-dialog block-popup-search-form"> 
    <form role="search" method="get" class="form-search searchform" action=""> 
     <input type="text" value="" name="s" class="search-query" placeholder="请输入关键字..." /> 
     <button type="submit" class="fa fa-search button-search-pro form-button"></button> 
     <a href="javascript:void(0)" title="Close" class="close close-search" data-dismiss="modal">X</a> 
    </form> 
   </div> 
  </div>   
  <!-- 登录 --> 
  <div class="modal fade" id="login_form" tabhome="-1" role="dialog" aria-hidden="true"> 
   <div class="modal-dialog block-popup-login"> 
    <a href="javascript:void(0)" title="Close" class="close close-login" data-dismiss="modal">X</a> 
    <div class="tt_popup_login"> 
     <strong>登录或注册</strong>     
    </div> 
     
     <div class="block-content">
       <form action="/login" method="get" id="login" style="display:block"> 
       {{csrf_field()}} 
        <div class="col-reg registered-account"> 
         <div class="email-input"> 
          <input type="text" class="form-control input-text username" name="username"  placeholder="用户名" /> 
         </div> 
         <div class="pass-input"> 
          <input class="form-control input-text password" type="password" placeholder="密码" name="password" id="password" /> 
         </div>
         <div class="pass-input"> 
          <input class="form-control input-text username" type="text" placeholder="验证码" name="code" id="username" />
          <div class="col-md-offset-7"> 
            <img src="/code" alt="" onclick="this.src=this.src+'?a=1'"> <span>看不清？换一个</span>  </span>
          </div>
         </div>
         @if(session('error'))
         <span style="color:red">{{session('error')}}</span>
         @endif 
         <div class="ft-link-p"> 
            <a href="#" title="Forgot your password">忘记密码?</a>
         </div> 
         <div class="actions"> 
          <div class="submit-login"> 
           <input type="submit" class="button btn-submit-login" value="登录" /> 
          </div> 
         </div> 
        </div> 
        </form> 
        <div class="col-reg login-customer"> 
         <h2>没有账号?</h2>  
         <h2>您可以选择以下任意一种方式注册</h2> <hr/>            
         <button class="btn-reg-popup go1">手机号注册</button> 
         <button class="btn-reg-popup go2">邮箱注册</button> 
         <a id="back" href="javascript:void(0)" style="display:none">返回</a>
        </div>
     <!--  </div>  -->     
      
      <!-- <div class="block-content" style="display:none"> -->
      <!-- <div class="col-xs-offset-1"> -->
        <!-- 注册1 -->
       <form action="" method="post" id="reg1" style="display:none">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input type="text" name="phone" class="form-control" placeholder="手机号" aria-describedby="sizing-addon2">
            <span class="input-group-btn">
              <a href="javascript:void(0)">发送验证码</a>
            </span>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="text" name="username" class="form-control" placeholder="用户名 4-6位字母数字下划线" aria-describedby="sizing-addon2">
          </div>                 
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" name="password" class="form-control" placeholder="输入密码 6-18个字符" aria-describedby="sizing-addon2">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" name="repassword" class="form-control" placeholder="确认密码" aria-describedby="sizing-addon2">
          </div>
        </div>  
        <div class="form-group">
          <div class="input-group">
            <span id="n1"  style="color:red"></span><br/>
            <button type="submit" href="create_account.html" title="Register" class="btn-reg-popup">创建账号</button>
          </div>
        </div>       
      </form>
     <!-- 注册2 -->
       <form action="/login" method="post" id="reg2" style="display:none">
        {{csrf_field()}}
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input type="email" name="email" class="form-control" placeholder="邮箱（用于账户激活）" aria-describedby="sizing-addon2">            
          </div>
        </div> 
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="text" name="username" class="form-control" placeholder="用户名 4-8位字母数字下划线" aria-describedby="sizing-addon2">
          </div>                 
        </div>       
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" name="password" class="form-control" placeholder="设置密码 6-18个字符" aria-describedby="sizing-addon2">            
          </div>
        </div>  
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" name="repassword" class="form-control" placeholder="确认密码" aria-describedby="sizing-addon2">            
          </div>
        </div>  
        <div class="form-group">
          <div class="input-group">
            <span id="n2" style="color:red"></span><br/>
            <button type="submit" href="create_account.html" title="Register" class="btn-reg-popup">创建账号</button>
          </div>
        </div>             
      </form>       
      <!-- </div>  -->
     </div>
    
    <div class="clear"></div> 
   </div> 
  </div> 
  </div> 
  <!-- 表单验证 -->
  <script type="text/javascript" src="/static/home/js/form.js"></script>   

  <script type="text/javascript" src="/static/home/js/jquery/jquery.min.js"></script> 
  <script type="text/javascript" src="/static/home/js/jquery/jquery-migrate.min.js"></script> 
  <script type="text/javascript" src="/static/home/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="/static/home/js/jquery/js.cookie.min.js"></script> 
  <!-- OPEN LIBS js --> 
  <script type="text/javascript" src="/static/home/js/owl-carousel/owl.carousel.min.js"></script> 
  <script type="text/javascript" src="/static/home/js/slick-1.6.0/slick.min.js"></script> 
  <script type="text/javascript">
    /* <![CDATA[ */
      var woocommerce_price_slider_params = {"currency_symbol":"$","currency_pos":"left","min_price":"100","max_price":"500"};
    /* ]]> */
  </script>

  <script type="text/javascript" src="/static/home/js/yith-woocommerce-compare/jquery.colorbox-min.js"></script> 
  <script type="text/javascript" src="/static/home/js/sw_core/isotope.js"></script> 
  <script type="text/javascript" src="/static/home/js/sw_core/jquery.fancybox.pack.js"></script> 
  <script type="text/javascript" src="/static/home/js/sw_woocommerce/category-ajax.js"></script> 
  <script type="text/javascript" src="/static/home/js/sw_woocommerce/jquery.countdown.min.js"></script> 
  <script type="text/javascript" src="/static/home/js/js_composer/js_composer_front.min.js"></script> 
  <script type="text/javascript" src="/static/home/js/plugins.js"></script> 
  <script type="text/javascript" src="/static/home/js/megamenu.min.js"></script> 
  <script type="text/javascript" src="/static/home/js/main.min.js"></script> 
  <script type="text/javascript">
		var sticky_navigation_offset_top = $("#header .header-bottom").offset().top;
		var sticky_navigation = function(){
									var scroll_top = $(window).scrollTop();
									if (scroll_top > sticky_navigation_offset_top) {
										$("#header .header-bottom").addClass("sticky-menu");
										$("#header .header-bottom").css({ "top":0, "left":0, "right" : 0 });
									} else {
										$("#header .header-bottom").removeClass("sticky-menu");
									}
								};
		sticky_navigation();
		$(window).scroll(function() {
			sticky_navigation();
		});
		
		$(document).ready (function () {
			$( ".show-dropdown" ).each(function(){
				$(this).on("click", function(){
					$(this).toggleClass("show");
					var $element = $(this).parent().find( "> ul" );
					$element.toggle( 300 );
				});
			});
		});
   </script> 
  <!--[if gte IE 9]><!--> 
  <script type="text/javascript">
		var request, b = document.body, c = 'className', cs = 'customize-support', rcs = new RegExp('(^|\\s+)(no-)?'+cs+'(\\s+|$)');
		request = true;
      
      	b[c] = b[c].replace( rcs, ' ' );
      	// The customizer requires postMessage and CORS (if the site is cross domain)
      	b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
   </script> 
  <!--<![endif]-->   
 </body>
</html>