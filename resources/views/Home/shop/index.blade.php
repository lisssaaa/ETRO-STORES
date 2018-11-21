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
 @section('content')
    
    <div class="container">
      <div class="row">
        <div id="contents" class="content col-lg-9 col-md-8 col-sm-8" role="main">
          <div class="listing-top">
            <div class="widget-2 widget-last widget sw_brand-2 sw_brand">
              <div class="widget-inner">
                <div id="sw_brand_01" class="responsive-slider sw-brand-container-slider clearfix" data-lg="5" data-md="4" data-sm="3" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
                  <div class="resp-slider-container">
                    <div class="slider responsive">

                      @foreach($brand as $value)
                      <div class="item item-brand-cat">
                        <div class="item-image">
                          <a href="javascript:void(0)" id="{{$value->id}}" onclick="brand(this.id)"><img width="134" height="70" src="/uploads/brand/{{$value->pic}}" class="attachment-173x91 size-173x91" alt=""></a>            
                        </div>
                      </div>
                     @endforeach 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <script>
             function brand(id){
                  // alert(id);
                  $.get('/shop',{brand:id},function(data){
                    // alert(data);
                    $('.ajax').replaceWith(data);
                  });                          
             }
           </script>
          <div id="container">
            <div id="content" role="main">
              <!--  Shop Title -->
              <div class="products-wrapper">
                <div class="products-nav clearfix">
                  <div class="view-mode-wrap pull-left clearfix">
                    <div class="view-mode">
                      <a href="javascript:void(0)" class="grid-view active" title="Grid view"><span>表格视图</span></a>
                      <!-- <a href="javascript:void(0)" class="list-view" title="List view"><span>列表视图</span></a> -->
                    </div>
                  </div>
                  
                  <div class="catalog-ordering">
                    <div class="orderby-order-container clearfix">
                      <ul class="orderby order-dropdown pull-left">
                        <li>
                          <span class="current-li"><span class="current-li-content"><a>综合排序</a></span></span>
                          <ul>
                            <li class="current"><a href="#">综合排序</a></li>
                            <li class=""><a href="#">销量</a></li>
                            <li class=""><a onclick="price('ASC')" href="javascript:void(0)">按价格升序</a></li>
                            <li class=""><a onclick="price('DESC')" href="javascript:void(0)">按价格降序</a></li>
                          </ul>
                        </li>
                      </ul>
                      <script>
                        function price(a){
                          $.get('/shop',{price:a},function(data){
                              // alert(data);
                              $('.ajax').replaceWith(data);
                          });
                        }
                    </script>
                      
                      <ul class="order pull-left">
                        <li class="asc"><a href="#"><i class="fa fa-long-arrow-down"></i></a></li>
                      </ul>
                      
                      
                    </div>
                  </div>
                  
                  <nav class="woocommerce-pagination pull-right">
                    <span class="note">页码:</span>
                    <ul class="page-numbers">
                      <li><span class="page-numbers current">1</span></li>
                      <li><a class="page-numbers" href="#">2</a></li>
                      <li><a class="page-numbers" href="#">3</a></li>
                      <li><a class="next page-numbers" href="#">?</a></li>
                    </ul>
                  </nav>
                </div>
                
                <div class="clear"></div>
              
                <ul class="products-loop row grid clearfix ajax">

                  @foreach($goods as $value)
                  <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 post-255 product type-product status-publish has-post-thumbnail product_cat-electronics product_cat-home-appliances product_cat-vacuum-cleaner product_brand-apoteket first instock sale featured shipping-taxable purchasable product-type-simple">
                    <div class="products-entry item-wrap clearfix">
                      <div class="item-detail">
                        <div class="item-img products-thumb">
                          <span class="onsale">打折!</span>
                          <a href="/shop/{{$value->id}}">
                            <div class="product-thumb-hover">
                              <img width="300" height="300" src="/uploads/goods/{{$value->pic}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="/uploads/goods/{{$value->pic}} 300w, /uploads/goods/{{$value->pic}} 150w, /uploads/goods/{{$value->pic}} 180w, /uploads/goods/{{$value->pic}} 600w" sizes="(max-width: 300px) 100vw, 300px">
                            </div>
                          </a>
                                        
                          <!-- 表格视图 -->
                          <div class="item-bottom clearfix">
                            <a onclick="addcart({{$value->id}})" rel="nofollow" href="javascript:void(0)" class="button product_type_simple" title="">加入购物车</a>                            
                            
                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
                              <div class="yith-wcwl-add-button show" style="display:block">
                                <a onclick="addwish({{$value->id}})" href="javascript:void(0)" rel="nofollow">添加收藏夹</a>
                                <!-- <img src="/static/home/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" /> -->
                              </div>
                             
                            </div>
                            
                          </div>
                        </div>
                        
                        <div class="item-content products-content">
                          <div class="reviews-content">
                            <div class="star"><span style="width: 70px"></span></div>
                          </div>
                          
                          <h4><a href="simple_product.html" title="">{{$value->name}}</a></h4>
                          
                          <span class="item-price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">￥</span>{{$value->price+100}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">￥</span>{{$value->price}}</span></ins></span>
                          
                          <div class="item-description">{{$value->descr}}</div>
                        </div>
                      </div>
                    </div>
                  </li> 
                  @endforeach 
                </ul>                 
                 
                 <script>
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
                <div class="clear"></div>
                
              </div>
            </div>
          </div>
        </div>
        
        <aside id="right" class="sidebar col-lg-3 col-md-4 col-sm-4">
          <div class="widget-1 widget-first widget woocommerce_product_categories-3 woocommerce widget_product_categories">
            <div class="widget-inner">
              <div class="block-title-widget">
                <h2><span>所有分类</span></h2>
              </div>
              
              <ul>
                @foreach($cate as $value)
                <li class="cat-item" onclick="down(this,{{$value->id}})"><a href="/shop?cate={{$value->id}}">{{$value->name}}</a><span class="count" >({{count($value->dev)}})</span></li>

                @if(count($value->dev)>0)
                @foreach($value->dev as $v)
                <li id="cate_{{$value->id}}" onclick="down(this,{{$v->id}})" class="cat-item" style="display:block"><a href="/shop?cate={{$v->id}}">■■■|{{$v->name}}</a> <span class="count">({{count($v->dev)}})</span></li>

                @if(count($v->dev)>0)
                @foreach($v->dev as $vv)
                <li id="cate_{{$value->id}}" class="cat-item" style="display:block"><a href="/shop?cate={{$vv->id}}">■■■■■■|{{$vv->name}}</a> <span class="count"></span></li>
                @endforeach
                @endif

                @endforeach
                @endif

                @endforeach
              </ul>
            </div>
          </div>
          <script>
              function down(t,id){
                // $('#cate_'+id).toggle();
                $('#cate_'+id).each(function(){
                //   alert($(this).attr('id'));
                //   $(this).toggle();
                });
              }
          </script>
          <div class="widget-4 widget woocommerce_price_filter-3 woocommerce widget_price_filter">
            <div class="widget-inner">
              <div class="block-title-widget">
                <h2><span>价格筛选</span></h2>
              </div>              
              
                <div class="price_slider_wrapper">
                  <div class="price_slider" style="display:none;"></div>
                  <div class="price_slider_amount">
                    <input type="text" id="min_price" name="min_price" data-min="50" placeholder="最低">
                    <input type="text" id="max_price" name="max_price" data-max="2000" placeholder="最高">
                    
                    <button id="between" type="submit" class="button">确定</button>
                    
                    <div class="price_label" style="display:none;">
                      价格: <span class="from"></span> - <span class="to"></span>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
              <script>
                  $('#between').click(function(){
                      max = $(this).prev().val();
                      min = $(this).prev().prev().val();

                      $.get('/shop',{min:min,max:max},function(data){
                        // alert(data);
                        $('.ajax').replaceWith(data);
                      });
                  })
              </script>
            </div>
          </div>
          
          <!-- <div class="widget-5 widget etrostore_best_seller_product-3 etrostore_best_seller_product">
            <div class="widget-inner">
              <div class="block-title-widget">
                <h2><span>Best Sellers</span></h2>
              </div>
              
              <div id="best-seller-01" class="sw-best-seller-product">
                <ul class="list-unstyled">
                  <li class="clearfix">
                    <div class="item-img">
                      <a href="simple_product.html" title="corned beef enim">
                        <img width="180" height="180" src="/static/home/images/1903/65-180x180.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="/static/home/images/1903/65-180x180.jpg 180w, /static/home/images/1903/65-150x150.jpg 150w, /static/home/images/1903/65-300x300.jpg 300w, /static/home/images/1903/65.jpg 600w" sizes="(max-width: 180px) 100vw, 180px">
                      </a>
                    </div>
                    
                    <div class="item-content">
                      <div class="reviews-content">
                        <div class="star"></div>
                        <div class="item-number-rating">
                          0 Review(s)         
                        </div>
                      </div>
                      
                      <h4><a href="simple_product.html" title="corned beef enim">Corned beef enim</a></h4>
                      
                      <div class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>400.00</span></div>
                    </div>
                  </li>
                   
                  <li class="clearfix">
                    <div class="item-img">
                      <a href="simple_product.html" title="philips stand">
                        <img width="180" height="180" src="/static/home/images/1903/62-180x180.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="/static/home/images/1903/62-180x180.jpg 180w, /static/home/images/1903/62-150x150.jpg 150w, /static/home/images/1903/62-300x300.jpg 300w, /static/home/images/1903/62.jpg 600w" sizes="(max-width: 180px) 100vw, 180px">
                      </a>
                    </div>
                    
                    <div class="item-content">
                      <div class="reviews-content">
                        <div class="star"></div>
                        <div class="item-number-rating">
                          0 Review(s)         
                        </div>
                      </div>
                      
                      <h4><a href="simple_product.html" title="philips stand">Philips stand</a></h4>
                      
                      <div class="price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>300.00</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>250.00</span></ins></div>
                    </div>
                  </li>
                   
                  <li class="clearfix">
                    <div class="item-img">
                      <a href="simple_product.html" title="Vacuum cleaner">
                        <img width="180" height="180" src="/static/home/images/1903/26-180x180.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="/static/home/images/1903/26-180x180.jpg 180w, /static/home/images/1903/26-150x150.jpg 150w, /static/home/images/1903/26-300x300.jpg 300w, /static/home/images/1903/26.jpg 600w" sizes="(max-width: 180px) 100vw, 180px">
                      </a>
                    </div>
                    
                    <div class="item-content">
                      <div class="reviews-content">
                        <div class="star"><span style="width:52.5px"></span></div>
                        <div class="item-number-rating">
                          4 Review(s)         
                        </div>
                      </div>
                      
                      <h4><a href="simple_product.html" title="Vacuum cleaner">Vacuum cleaner</a></h4>
                      
                      <div class="price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>350.00</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>260.00</span></ins></div>
                    </div>
                  </li>
                   
                  <li class="clearfix">
                    <div class="item-img">
                      <a href="simple_product.html" title="veniam dolore">
                        <img width="180" height="180" src="/static/home/images/1903/45-180x180.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="/static/home/images/1903/45-180x180.jpg 180w, /static/home/images/1903/45-150x150.jpg 150w, /static/home/images/1903/45-300x300.jpg 300w, /static/home/images/1903/45.jpg 600w" sizes="(max-width: 180px) 100vw, 180px">
                      </a>
                    </div>
                    
                    <div class="item-content">
                      <div class="reviews-content">
                        <div class="star"><span style="width:35px"></span></div>
                        <div class="item-number-rating">
                          2 Review(s)         
                        </div>
                      </div>
                      
                      <h4><a href="simple_product.html" title="veniam dolore">Veniam dolore</a></h4>
                      
                      <div class="price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>250.00</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>190.00</span></ins></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div> -->
          
          <div class="widget-6 widget-last widget text-6 widget_text">
            <div class="widget-inner">
              <div class="textwidget">
                <div class="banner-sidebar">
                  <img src="/static/home/images/1903/banner-detail.jpg" title="banner" alt="banner">
                </div>
              </div>
            </div>
          </div>
        </aside>
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

