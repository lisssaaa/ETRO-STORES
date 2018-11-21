﻿<!DOCTYPE html>
<html lang="en">
<head>  
  <title>Products Archive</title>
  <meta charset="utf-8" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <!-- GOOGLE WEB FONTS -->
  <link rel="stylesheet" href="/static/home/css/font-awesome.min.css">
  
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

<body class="archive post-type-archive woocommerce post-type-archive-product">

 @extends('Home.public') 
 @section('location','')
 @section('title','')
 @section('this','')
 @section('content')
  
  <div class="container">
      <div class="row">
        <div style="background:#f2f2f2;height:300px;text-align:center;line-height:150px">
          <img style="position:absolute;left:600px" src="/static/home/images/success.jpg" alt="" width="150px"><br/>
          <h1>订单支付成功！</h1>
          <a href="/shop" class="btn btn-default">返回首页</a>
          <a href="/myaccount/{{$oid}}" class="btn btn-warning">查看我的订单</a>
        </div>
      </div>
    </div>
    <br/>
    <br/>
@endsection
  

  <script type="text/javascript" src="/static/home/js/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/static/home/js/jquery/jquery-migrate.min.js"></script>
  <script type="text/javascript" src="/static/home/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/static/home/js/jquery/js.cookie.min.js"></script>
  
  <!-- OPEN LIBS JS -->
  <script type="text/javascript" src="/static/home/js/owl-carousel/owl.carousel.min.js"></script>
  <script type="text/javascript" src="/static/home/js/slick-1.6.0/slick.min.js"></script>
  
  <script type="text/javascript">
    /* <![CDATA[ */
      var woocommerce_price_slider_params = {"currency_symbol":"$","currency_pos":"left","min_price":"100","max_price":"500"};
    /* ]]> */
  </script>
  
  <script type="text/javascript" src="/static/home/js/widget.min.js"></script>
  <script type="text/javascript" src="/static/home/js/mouse.min.js"></script>
  <script type="text/javascript" src="/static/home/js/slider.min.js"></script>
  <script type="text/javascript" src="/static/home/js/js_composer/js_composer_front.min.js"></script>
  
  <script type="text/javascript" src="/static/home/js/yith-woocommerce-compare/jquery.colorbox-min.js"></script>
  <script type="text/javascript" src="/static/home/js/sw_core/isotope.js"></script>
  <script type="text/javascript" src="/static/home/js/sw_core/jquery.fancybox.pack.js"></script>
  <script type="text/javascript" src="/static/home/js/sw_woocommerce/category-ajax.js"></script>
  <script type="text/javascript" src="/static/home/js/sw_woocommerce/jquery.countdown.min.js"></script>
  <script type="text/javascript" src="/static/home/js/woocommerce/price-slider.min.js"></script>
  
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

