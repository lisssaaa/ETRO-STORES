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
  <script src="/static/home/js/jquery-1.7.2.min.js"></script> 
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
             <li> <a href="/myaccount/{{$uid}}/edit">个人资料</a> </li> 
             <li class="is-active"> <a href="/myaddress">收货地址</a> </li>
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
               <form class="edit-account" action="/myaddress/{{$addr->id}}" method="post"> 
                {{csrf_field()}}
                {{method_field('PUT')}}
                <!-- <input type="hidden" name="uid" value="{{$uid}}"> -->
                <!-- <input type="hidden" name="adds" value="{{$addr->adds}}"> -->
                <div class="clear"></div> 
                <p class="form-row form-row-first"> 
                  <label for="account_first_name"> 收货人 <span class="required">*</span> </label>
                  <input type="text" class="input-text" name="name" value="{{$addr->name}}"> 
                </p> 
                <p class="form-row form-row-first"> 
                  <label for="account_first_name"> 手机号码 <span class="required">*</span> </label>
                  <input type="text" class="input-text" name="phone" value="{{$addr->phone}}"> 
                </p> 
                <p class="form-row form-row-first"> 
                  <label for="account_first_name"> 收货地址 <span class="required">*</span></label>
                  <input type="text" class="input-text" name="adds" value="{{$addr->adds}}"> 
                  <div class="clear"></div> 
                  <select id="sid">
                    <option value="" class="ss">--请选择--</option>
                  </select>
                </p> 
                <p> <input id="edit" type="submit" class="button" value="修改"> </p> 
             </form>
             <form action="/myaddress/{{$addr->id}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <p> <input id="edit" type="submit" class="button" value="删除收货地址"> </p> 
             </form>
            <script>
              //提交表单
              $('#edit').click(function(){
                a = '';
                arr = [];
                //console.log($('select'));
                //查找所有select中，选中的option项
                $('select').each(function(){
                  opdata = $(this).find('option:selected').html();
                  if(opdata!='所有分类' && opdata!= '--请选择--'){
                    //将选中的项存入数组
                    arr.push(opdata);
                  }                 
                });
                
                //为空时用户未修改地址
                
                for(var i=0;i<arr.length;i++){
                  a += arr[i]; 
                }  

                if(a!=''){               
                  //将得到的数组直接赋值给隐藏域
                  $('input[name=adds]').val(a);
                }               
              });

              //第一级别内容
              $.get('/city',{upid:0},function(result){
                // console.log(result);
                //禁止请选择选中
                $('.ss').attr('disabled','true');
                //得到对象数组 遍历
                for(var i = 0;i<result.length;i++){
                  //得到每一个对象
                  //创建每一个option标签并添加到select标签中
                  var op = $('<option value="'+ result[i].id+'">'+ result[i].name +'</option>');
                  $('#sid').append(op);
                }
              },'json');
             
              $(document).on('change','select',function(){
                
                  //将当前对象存储起来
                  obj = $(this);
                  var id = obj.val();
                  // alert(obj.val());
                  //清除所有的select
                  obj.nextAll('select').remove();    

                  $.get('/city',{'upid':id},function(result){ 
                    // console.log(result);
                    if(result !=''){    
                      //新建并添加区的select
                      var select = $('<select></select>');
                      select.append('<option class="mm">--请选择--</option>');
                      obj.after(select);  

                      //得到对象数组 遍历
                      for(var i = 0;i<result.length;i++){
                        //得到每一个对象
                        //创建每一个option标签并添加到select标签中
                        var op = $('<option value="'+ result[i].id+'">'+ result[i].name +'</option>');
                        select.append(op);
                      } 
                      //禁止请选择选中
                      $('.mm').attr('disabled','true');
                      }
                  },'json');
                
              });             
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
   </div> 
   @endsection 
 </body>
</html>