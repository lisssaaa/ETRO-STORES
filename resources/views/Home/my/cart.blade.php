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
 @section('title','购物车')
 @section('content')
   <div class="container"> 
  <div class="row"> 
   <div id="contents" role="main" class="main-page col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="page type-page status-publish hentry"> 
     <div class="entry-content"> 
      <div class="entry-summary"> 
       <div class="woocommerce"> 
        @if($arr)
        <form action="" method="post"> 
         <table class="shop_table shop_table_responsive cart" cellspacing="0">           
          <thead> 
           <tr> 
            <th colspan="2" class="product-remove">&nbsp;</th>           
            <th class="product-name">商品</th> 
            <th class="product-price">单价</th> 
            <th class="product-quantity">数量</th> 
            <th colspan="2" class="product-subtotal">总计</th> 
           </tr> 
          </thead> 
          <tbody>
          
          @foreach($arr as $key=>$value) 
           <tr class="cart_item">
            <td><input type="checkbox" value="{{$value['id']}}"></td>             
            <td class="product-thumbnail"> 
              <img src="/uploads/goods/{{$value['pic']}}" alt=""> 
            </td> 
            <td class="product-name" data-title="Product"><a href="simple_product.html">{{$value['name']}}</a> </td> 
            <td class="product-price" data-title="Price">{{$value['price']}}</td> 
            <td class="product-quantity" data-title="Quantity"> 
             <div class="quantity"> 
              <a class="btn btn-default dec" href="javascript:void(0)">─</a>              
              <input type="number" step="1" min="1" name="num" value="{{$value['num']}}" cid="{{$value['id']}}" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" />              
              <a class="btn btn-default add" href="javascript:void(0)">+</a>
             </div> 
           </td> 
            <td class="product-subtotal" data-title="Total">{{$value['price']*$value['num']}}</td> 
            <td class="product-remove">
              <form action="/mycart/{{$value['id']}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn-xs btn-warning"><i class="fa fa-trash-o"></i></button>                
              </form>
            </td> 
           </tr>           
           
           @endforeach 
           <tr class="order-total"> 
            <td colspan="7">               
                <a href="javascript:void(0)" class="btn-xs btn-default all">全选</a> 
                <a href="javascript:void(0)" class="btn-xs btn-default">反选</a>  
                <a href="javascript:void(0)" class="btn-xs btn-default">批量删除</a>           
            </td>               
           </tr> 
          </tbody>
          <script>
            //复选框改变            
            $(':checkbox').each(function(){   
              $(this).change(function(){                
                gettotal(); 
              });
            });

            //修改件数和总额函数
            function gettotal(){
              $('#i').html($(':checked').length);
              var total = 0.00;
              $(':checked').each(function(){ 
                //获取该行总计金额             
                t = $(this).parents('td').siblings('.product-subtotal').text();
                if(t != ''){
                  total += parseFloat(t); 
                }                  
              });
              $('#total').html(total);
            }
            
            //数量加减
            $('.add').click(function(){
              num = $(this).siblings('input');
              num.val(parseInt(num.val())+1);              
              //使用create方法进行更新
              $.get('/mycart/create',{id:num.attr('cid'),num:num.val()},function(data){ 
                //获取商品单价
                price = num.parents('td').prev().text();
                total = parseFloat(price)*num.val();
                //修改该行总计值
                num.parents('td').next().text(total);
                // alert(total);
                gettotal();  
              });
              
            });
            $('.dec').click(function(){
              num = $(this).siblings('input');
              if(num.val()!=1){
                 num.val(parseInt(num.val())-1);
                //使用create方法进行更新
                $.get('/mycart/create',{id:num.attr('cid'),num:num.val()},function(data){  
                  //获取商品单价
                  price = num.parents('td').prev().text();
                  total = parseFloat(price)*num.val();
                  //修改该行总计值
                  num.parents('td').next().text(total);
                  // alert(total);
                  gettotal();  
                });
              }             
            });

            //全选反选删除
            bool=true;                
            $('.all').click(function(){
              //选择表单中的checkbox类型，设置所有的checked=true全选
              $(':checkbox').prop('checked',bool);
              gettotal(); 
              bool=!bool;
            }).next().click(function(){
              //选择表单中checkbox类型，遍历集合中的每一个元素，将checked设置为与自身相反的值
              $(':checkbox').each(function(){
                $(this).prop('checked',!$(this).prop('checked'));
                gettotal(); 
              });
            }).next().click(function(){                  
              if(!$(':checked').length){
                alert('必须至少选择一条数据');
              }else{
                ids = [];
                //获取所有选中的复选框并遍历
                $(':checked').each(function(){
                  if($(this).val() != ''){
                    //将id存入数组
                    ids.push($(this).val());                    
                  }                  
                });
                // alert(ids);
                // if(confirm('您确定要删除吗？')){                                  
                    $.get('/cartdel',{ids:ids},function(data){
                      console.log(data);
                    })
                  // $(':checked').each(function(){
                  //   $(this).parents('tr').remove();
                  // });
                  // gettotal();                                        
                // }
              }              
            });            
          </script> 
         </table> 
        </form> 
        <div class="cart-collaterals"> 
         <div class="products-wrapper"> 
          <div class="cart_totals ">
          <table class="shop_table shop_table_responsive cart" cellspacing="0"> 
            <thead>
              <tr class="cart_item">
                <th>已选：</th>
                <th><strong><span style="color:orange" id="i">0</span></strong>件</td>
              </tr>
              <tr class="cart_item">
                <th>合计(不含运费)：</th>
                <th><strong><span style="color:orange" id="total">0.00</span>元</strong></td>
              </tr>
            </thead>
          </table>
           <div style="float:right"> 
            <a href="/shop/create" class="btn-lg btn-warning">去结算</a> 
           </div> 
          </div> 
         </div> 
        </div>
        @else
        购物车为空！
        @endif 
       </div> 
      </div> 
     </div> 
     <div class="clearfix"></div> 
    </div> 
   </div> 
  </div>
 @endsection 
 </body>
</html>