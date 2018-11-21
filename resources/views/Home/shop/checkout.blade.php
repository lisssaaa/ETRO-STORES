<!DOCTYPE html>
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
 @section('location','首页')
 @section('title','结算')
 @section('this','确认订单')
 @section('content')
  
  <div class="container">
      <div class="row">
        <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="page type-page status-publish">
            <div class="entry-content">
              <div class="woocommerce">

                <form method="post" class="checkout woocommerce-checkout" action="/shop">
                  {{csrf_field()}}
                  <div class="col2-set" id="customer_details">
                    <div class="col-1">
                      <h3 id="order_review_heading">选择收货地址：</h3>
                      <div id="payment" class="woocommerce-checkout-payment">
                      <ul class="wc_payment_methods payment_methods methods">
                        @foreach($address as $value)                        
                        <li class="wc_payment_method payment_method_cheque">
                          <input id="payment_method_cheque" type="radio" class="input-radio" name="aid" value="{{$value->id}}"  @if($value->id==$default) checked @endif>
                          <label for="payment_method_cheque">{{$value->name}}/{{$value->phone}}/{{$value->adds}} @if($value->id==$default)<span class="badge" style="background-color:orange">默认</span></label> @endif
                        </li>
                        @endforeach
                        
                      </ul>
                      </div>
                    </div>
                  
                    
                  </div>
                  <hr/>
                  
             
                  <div id="order_review" class="woocommerce-checkout-review-order">
                  <!-- <hr/> -->
                    <table class="shop_table woocommerce-checkout-review-order-table">
                      <thead>
                        <tr>                          
                          <th class="product-name" colspan="2">商品</th>
                          <th class="product-total">单价</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php $total=0;?>
                        @foreach($cart as $value)
                        <tr class="cart_item">
                          <td class="product-name">
                              <img width="50px" src="/uploads/goods/{{$value['pic']}}" alt="">
                          </td>
                          <td class="product-name">
                            {{$value['name']}}&nbsp;<strong class="product-quantity"><span style="color:orange">× {{$value['num']}}</span></strong>                         
                          </td>
                          
                          <td class="product-total">
                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">￥</span>{{$value['price']}}</span>           
                          </td>
                        </tr>
                        <input type="hidden" name="cid[]" value="{{$value['id']}}">
                        <?php $total+=$value['price']*$value['num'];?>
                        @endforeach
                      </tbody>
                      
                      <tfoot>
                        <tr class="cart-subtotal">

                          <th>共：</th>
                          <td class="product-name"></td>
                          <td>
                            <span class="woocommerce-Price-amount amount">
                              <span class="woocommerce-Price-currencySymbol" style="color:orange">{{count($cart)}}</span>件商品
                            </span>
                          </td>
                        </tr>
                        
                        <tr class="order-total">
                          <th>合计：</th>
                          <td class="product-name"></td>
                          <td>
                            <strong>
                              <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">￥</span><span style="color:orange">{{$total}}</span>
                              </span>
                            </strong> 
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                    <h3 id="order_review_heading">结算</h3>
                    <div id="payment" class="woocommerce-checkout-payment">
                      <ul class="wc_payment_methods payment_methods methods">
                        <li class="wc_payment_method payment_method_cheque">
                          <label for="payment_method_cheque">配送方式：中通快递&nbsp;&nbsp;免邮</label>
                        </li>
                        <li class="wc_payment_method payment_method_cheque">
                          <label for="payment_method_cheque">运费险：&nbsp;&nbsp;&nbsp;&nbsp;卖家送，确认收货前退款可赔</label>
                        </li>
                        <li class="wc_payment_method payment_method_cheque">
                          <input id="payment_method_cheque" type="radio" class="input-radio" value="cheque" checked="checked" data-order_button_text="">
                          <label for="payment_method_cheque">支付宝<img style="width:80px" src="/static/home/images/alipay.jpg" alt="PayPal Acceptance Mark"></label>
                          
                        </li>
                        
                      </ul> 
                      
                      <div class="form-row place-order">
                        <input type="hidden" name="total" value="{{$total}}">
                        <input type="submit" class="button alt" id="place_order" value="提交订单" data-value="Place order">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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

