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
 @section('title','商品')
 @section('this',$good->name)
 @section('content')
  
  <div class="container">
      <div class="row">
        <div id="contents-detail" class="content col-lg-12 col-md-12 col-sm-12" role="main">
          <div id="container">
            <div id="content" role="main">
              <div class="single-product clearfix">
                <div id="product-01" class="product type-product status-publish has-post-thumbnail product_cat-accessories product_brand-global-voices first outofstock featured shipping-taxable purchasable product-type-simple">
                  <div class="product_detail row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
                      <div class="slider_img_productd">
                        <!-- woocommerce_show_product_images -->
                        <div id="product_img_01" class="product-images" data-rtl="false">
                          <div class="product-images-container clearfix thumbnail-bottom">
                            <!-- Image Slider -->
                            <div class="slider product-responsive slick-initialized slick-slider">
                              <div aria-live="polite" class="slick-list draggable" tabindex="0">
                                <div class="slick-track" style="opacity: 1; width: 2820px;">
                                <div class="item-img-slider slick-slide slick-active" data-slick-index="0" aria-hidden="false" style="width: 470px; position: relative; left: 0px; top: 0px; z-index: 900; opacity: 1;">
                                <div style="width:500px;height:500px;border:1px solid #e6e6e6;vertical-align:middle">          
                                  
                                    <img id="small" style="width:340px;margin: 100px" src="/uploads/goods/{{$good->pic}}" class="attachment-shop_single size-shop_single" alt="" srcset="/uploads/goods/{{$good->pic}} 600w, /uploads/goods/{{$good->pic}} 150w, images/1903/49-300x300.jpg 300w, /uploads/goods/{{$good->pic}} 180w" sizes="(max-width: 600px) 100vw, 600px">
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                            
                            <!-- Thumbnail Slider -->
                          <div class="slider product-responsive-thumbnail slick-initialized slick-slider" id="product_thumbnail_247">
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
                      <div class="content_product_detail">
                        <h1 class="product_title entry-title">{{$good->name}}</h1>
                        
                        <div class="reviews-content">
                          <div class="star"></div>
                          <a href="#reviews" class="woocommerce-review-link" rel="nofollow"><span class="count">0</span> Review(s)</a>
                        </div>
                        
                        <div>
                          <p class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">￥</span>{{$good->price}}</span></p>
                        </div>
                        <a class="btn btn-warning" onclick="addcart({{$good->id}})" href="javascript:void(0)">加入购物车</a>
                        <a class="btn btn-warning" onclick="addwish({{$good->id}})" href="javascript:void(0)">加入收藏夹</a>
                    </div>
                      <div id="big" style="height:300px;position:absolute;left:0px;top:190px;overflow:hidden;display:none;border:1px solid #e6e6e6">
                          <img src="/uploads/goods/{{$good->pic}}"/>
                      </div>
                        <script>
                            $('#small').mousemove(function(e){
                               var e = e || event;
                               // alert(e.pageX+'---'+e.pageY);
                               $('#big').scrollLeft(e.pageX-400);
                               $('#big').scrollTop(e.pageY-400);
                               $('#big').show();
                            });
                            $('#small').mouseout(function(){
                                $('#big').hide();
                            });

                             function addcart(id){
                                $.get('/mycart/'+id,function(data){
                                  if(data==1){
                                    alert('添加购物车成功');
                                  }else{
                                    alert('请先登录！');
                                  } 
                                });
                             }
                             function addwish(id){
                               $.get('/mywish/'+id,function(data){
                                  if(data==0){
                                    alert('添加收藏夹成功');
                                  }else if(data==1){
                                    alert('抱歉，您已收藏过该商品！');
                                  }else{
                                    alert('请先登录！');
                                  } 
                                });
                             }
                        </script>
                        
                    </div>
                  </div>
                </div>
                
                <div class="tabs clearfix">
                  <div class="tabbable">
                    <ul class="nav nav-tabs">
                      <li class="description_tab active">
                        <a href="#tab-description" data-toggle="tab">商品详情</a>
                      </li>
                      
                      <li class="reviews_tab ">
                        <a href="#tab-reviews" data-toggle="tab">宝贝评价(@if($comment) {{count($comment)}} @else 0 @endif)</a>
                      </li>
                    </ul>
                    
                    <div class="clear"></div>
                    
                    <div class=" tab-content">
                      <div class="tab-pane active" id="tab-description">
                        <h2>商品详情</h2>
                        <p>{{$good->descr}}</p>
                        
                      </div>
                      
                      <div class="tab-pane " id="tab-reviews">
                        <!-- 评价 -->
                        @if($comment)
                       <div class="vc_column-inner "> 
                          <div class="wpb_wrapper"> 
                           <div id="sw_testimonial01" class="testimonial-slider client-wrapper-b carousel slide " data-interval="0"> 
                            <div class="carousel-cl nav-custom"> 
                             <a class="prev-test fa fa-angle-left" href="#sw_testimonial01" role="button" data-slide="prev"><span></span></a> 
                             <a class="next-test fa fa-angle-right" href="#sw_testimonial01" role="button" data-slide="next"><span></span></a> 
                            </div> 
                            <div class="carousel-inner"> 
                              <!-- 显示两个 -->
                             <div class="item active"> 
                              @for($i=0;$i<2;$i++)
                              <div class="item-inner"> 
                               <div class="image-client pull-left"> 
                                <a href="#" title="">
                                  @if($comment[$i]->upic) 
                                  <img width="127" height="127" src="/uploads/users/{{$comment[$i]->upic}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt=""> 
                                  @else
                                  <img width="127" height="127" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY3MjEwYjMzYjAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjcyMTBiMzNiMCI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OS41NTQ2ODc1IiB5PSI5NC41Ij4xNzF4MTgwPC90ZXh0PjwvZz48L2c+PC9zdmc+" class="attachment-thumbnail size-thumbnail wp-post-image"  data-holder-rendered="true" alt="">
                                  @endif
                                </a> 
                               </div> 
                               <div class="client-say-info"> 
                                <div class="client-comment">
                                  {{$comment[$i]->comment}}
                                  <div class="reviews-content">
                                  <div class="star"><span style="width: {{$comment[$i]->star}}0px"></span></div>
                                  </div>
                                </div> 
                                <div class="name-client"> 
                                 <p style="color:orange">{{$comment[$i]->user}}</p>
                                </div>
                               </div> 
                              </div> 
                              @endfor
                             </div>
                            <!-- 显示其他 -->
                             <div class="item ">
                              @for($i=2;$i<count($comment);$i++) 
                              <div class="item-inner"> 
                               <div class="image-client pull-left"> 
                                <a href="#" title=""> 
                                  @if($comment[$i]->upic) 
                                  <img width="127" height="127" src="/uploads/users/{{$comment[$i]->upic}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt=""> 
                                  @else
                                  <img width="127" height="127" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY3MjEwYjMzYjAgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjcyMTBiMzNiMCI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OS41NTQ2ODc1IiB5PSI5NC41Ij4xNzF4MTgwPC90ZXh0PjwvZz48L2c+PC9zdmc+" class="attachment-thumbnail size-thumbnail wp-post-image"  data-holder-rendered="true" alt=""> 
                                  @endif
                                </a> 
                               </div> 
                               <div class="client-say-info"> 
                                <div class="client-comment">
                                  {{$comment[$i]->comment}}
                                  <div class="reviews-content">
                                  <div class="star"><span style="width: {{$comment[$i]->star}}0px"></span></div>
                                  </div>
                                </div> 
                                <div class="name-client"> 
                                 <p style="color:orange">{{$comment[$i]->user}}</p> 
                                </div> 
                               </div> 
                              </div> 
                               @endfor
                             </div> 
                            </div> 
                           </div> 
                           @else
                           暂无评价！
                           @endif
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

