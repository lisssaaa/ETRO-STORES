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
 @section('title','收藏夹')
 @section('content')
   <div class="container">
      <div class="row">
        <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="post-6 page type-page status-publish hentry">
            <div class="entry-content">
              <div class="entry-summary">
                <div id="yith-wcwl-messages"></div>
                <form id="yith-wcwl-form" action="" method="post" class="woocommerce">
                 
                  <!-- WISHLIST TABLE -->
                  <table class="shop_table cart wishlist_table">
                    <thead>
                      <tr>
                        <th class="product-remove" colspan="2">&nbsp;</th>

                        <th class="product-name">
                          <span class="nobr">商品</span>
                        </th>
                        
                        <th class="product-price">
                          <span class="nobr">单价</span>
                        </th>
                        
                        <th class="product-stock-stauts">
                          <span class="nobr">商品描述</span>
                        </th>
                        
                        <th class="product-add-to-cart"></th>
                        <th class="product-remove"></th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      @foreach($good as $value)
                      <tr>                      
                        <td><input type="checkbox"></td>
                        <td><img src="/uploads/goods/{{$value->pic}}" width="60px" alt=""></td> 
                        <td class="product-name">                          
                          <a href="simple_product.html">{{$value->name}}</a>
                        </td>
                        
                        <td class="product-price">
                          <del>
                            ￥10000
                          </del>                           
                          <ins>
                            ￥{{$value->price}}
                          </ins>                            
                        </td>                        
                        <td class="product-stock-status">
                          <span class="wishlist-in-stock">{{$value->descr}}</span>                          
                        </td>                         
                        <td class="product-add-to-cart col-xs-2">
                          <form action="/mycart" method="post">
                            {{csrf_field()}}                                                         
                            <input type="hidden" name="gid" value="{{$value->id}}">                        
                            <button  type="submit" class="btn btn-warning">加入购物车</button>                            
                          </form>                                                 
                        </td>
                        <td>
                          {{$value->id}}                                                     
                            <form action="/mywish/{{$value->id}}" method="post">
                              {{method_field('DELETE')}}
                              {{csrf_field()}}                              
                              <button type="submit" class="btn btn-default btn-xs">
                                <i class="fa fa-trash-o"></i>
                              </button>                  
                            </form> 
                        </td>
                      </tr>
                      @endforeach
                      <tr class="order-total"> 
                        <td colspan="7">               
                            <a href="javascript:void(0)" class="btn-xs btn-default all">全选</a> 
                            <a href="javascript:void(0)" class="btn-xs btn-default">反选</a>  
                            <a href="javascript:void(0)" class="btn-xs btn-default">删除</a>             
                        </td>               
                       </tr> 
                    </tbody>
                    <script>
                      //全选反选删除
                      bool=true;                
                      $('.all').click(function(){
                        //选择表单中的checkbox类型，设置所有的checked=true全选
                        $(':checkbox').prop('checked',bool);
                        bool=!bool;
                      }).next().click(function(){
                        //选择表单中checkbox类型，遍历集合中的每一个元素，将checked设置为与自身相反的值
                        $(':checkbox').each(function(){
                          $(this).prop('checked',!$(this).prop('checked'));
                        });
                      }).next().click(function(){                  
                        if(!$(':checked').length){
                            alert('必须至少选择一条数据');
                        }else{
                          ids = [];
                          //获取所有选中的复选框并遍历
                          $(':checked').each(function(){
                              //将id存入数组
                              ids.push($(this).val());
                              $(this).parents('tr').remove();
                          });
                          if(confirm('您确定要删除吗？')){                    
                              $.get('/mywishdel',{ids:ids},function(data){
                                 alert(data);
                            });                                       
                          }
                        }              
                      });
                  </script>
                    <tfoot>
                       <tr>
                        <td colspan="7">
                         <div class="yith-wcwl-share">
                          <h4 class="yith-wcwl-share-title">Share on:</h4>
                            <table style="border:0px">
                              <tr style="border:0px">
                                <td style="border:0px"><a target="_blank" href="" title="分享至微信"><img width="25px" src="/static/home/images/weixin.jpg" alt=""></a></td>
                                <td style="border:0px"><a target="_blank" class="twitter" href="" title="分享至好友"><img width="35px" src="/static/home/images/qq.jpg" alt=""></a></td>
                                <td style="border:0px"><a target="_blank" class="twitter" href="" title="分享至朋友圈"><img width="40px" src="/static/home/images/pengyouquan.jpg" alt=""></a></td>
                                <td style="border:0px"><a target="_blank" class="twitter" href="" title="分享至空间"><img width="25px" src="/static/home/images/kongjian.jpg" alt=""></a></td>
                              </tr>
                            </table>
                         </div>
                        </td>
                       </tr>
                    </tfoot>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 @endsection 
 </body>
</html>