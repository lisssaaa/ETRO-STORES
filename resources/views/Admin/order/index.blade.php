<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    
    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/admin/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/static/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/static/admin/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/switch.css">    
    <link href="/static/admin/css/style-responsive.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/static/admin/css/style.css" rel="stylesheet">
    <link href="/static/admin/css/style-responsive.css" rel="stylesheet">
    <style>
        .label{
          cursor: pointer;
        }
    </style>

    <script src="/static/admin/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

  <section id="container" >
      @extends('Admin.public') 
      @section('content')    
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      
      <section id="main-content"> 
       <section class="wrapper"> 
        <h3><i class="fa fa-angle-right"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 订单管理</font></font></h3> 
        
        <!-- row --> 
        <div class="row mt"> 
         <div class="col-md-12"> 
          <div class="content-panel">
          &nbsp;&nbsp;&nbsp; 
            <div class="btn-group">
              <div class="btn-group">
                <a href="/adminorder" class="btn btn-warning active"><span class="fa fa-tasks"></span>&nbsp;&nbsp;<font style="vertical-align: inherit;">订单列表</font></a>
              </div>
              <!-- <div class="btn-group">
                <a href="/adminuser/create" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;<font style="vertical-align: inherit;">添加会员</font></a>
              </div>     -->          
            </div>
            <div class="col-md-offset-9">
            <form class="form-inline" action="/adminorder" method="get">
                <div class="input-group">           
                  <input type="text" class="form-control" name="keywords" value="{{$k or ''}}" id="exampleInputName2" placeholder="请输入订单号">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
                 </span>
                </div>
              </form>
            </div>
        
           <hr />
           <table class="table table-striped table-advance table-hover"> 
            <thead> 
             <tr> 
              <th><i class="fa fa-bullhorn"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> id</font></font></th> 
              <th class="hidden-phone"><i class="fa fa-question-circle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 订单号</font></font></th> 
              <th><span class="glyphicon glyphicon-user"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> uid:user</font></font></th> 
              <th><span class="glyphicon glyphicon-map-marker"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> aid:address</font></font></th> 
              <th><span class="glyphicon glyphicon-stats"></span></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 总金额</font></font></th>
              <th><i class=" fa fa-edit"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 状态</font></font></th> 
              <th></th> 
             </tr> 
            </thead> 
            <tbody> 
              @foreach($order as $key=>$value)
             <tr> 
              <td><a href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$key+1}}</font></font></a></td> 
              <td class="hidden-phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value['order_num']}}</font></font></td> 
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value['uid']}}：{{$value['user']}}</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value['aid']}}：{{$value['address']->name}}/{{$value['address']->phone}}/{{$value['address']->adds}}</font></font></td>  
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value['total']}}</font></font></td>
              <td>                       
                <span onclick="change(this,{{$value['id']}},0)" class="label @if($value['status']==0)label-danger @else label-default @endif">待付款</span>
                <span onclick="change(this,{{$value['id']}},1)" class="label @if($value['status']==1)label-primary @else label-default @endif">待发货</span>
                <span onclick="change(this,{{$value['id']}},2)" class="label @if($value['status']==2)label-info @else label-default @endif">待收货</span>
                <span onclick="change(this,{{$value['id']}},3)" class="label @if($value['status']==3)label-warning @else label-default @endif">待评价</span>
                <span onclick="change(this,{{$value['id']}},4)" class="label @if($value['status']==4)label-success @else label-default @endif">完成</span>
              </td>    
                            
              <td> 
                <table border="0px">
                  <tr>
                    <td>
                      <button class="btn btn-primary btn-xs" data-orderId="{{$value['id']}}" data-toggle="modal" data-target="#mymodal">
                        <span>订单详情</span>
                      </button>
                    </td>
                    <td>&nbsp;&nbsp;</td>
                    
                  </tr>
                </table>   
              </td> 
             </tr>    
             @endforeach
             <!-- 会员地址列表 -->
            <div class="modal fade" id="mymodal"> 
               <div class="modal-dialog"> 
                <div class="modal-content"> 
                 <!-- 这是模态框的头 --> 
                 <div class="modal-header"> 
                  <!-- 关闭modal框的 data-dismiss --> 
                  <button class="close" data-dismiss="modal">&times;</button> 
                  <h3>&gt;订单详情</h3> 
                 </div> 
                 <!-- 地址数据--> 
                 <div style="height:500px; overflow:auto;"> 
                  <div class="task-content" id="sortable"> 
                    
                  </div> 
                 </div> 
                </div> 
               </div> 
              </div>         
             <!-- 地址列表结束 -->
            </tbody> 
           </table> 

           @if(!$k)
           <div class="btn-group btn-group-sm" role="group" id="page">
           @foreach($p as $v)           
            <button onclick="page(this,{{$v}})" class="btn btn-default">{{$v}}</button>          
           @endforeach   
           </div>
           @endif          
  
           <br/>
           <br/>          
          </div>
         <script>
              //模态框显示订单详情，即商品列表
              $('#mymodal').on('show.bs.modal',function(e) {
                  //初始化模态框                          
                  $('#sortable').empty();
                  var id = $(e.relatedTarget).data('orderid');
                  // console.log(id);
                  //ajax获取当前用户的地址数据
                  $.get('/adminorder/' + id,function(data) {
                      // console.log(typeof data);//json字符串
                      data = eval(data); //js对象
                      
                      t = "<table class='table table-hover'><thead><tr><th>商品id</th><th></th><th>商品</th><th>单价</th><th>数量</th></tr></thead><tbody id='t'></tbody></table>";
                      $('#sortable').append(t);
                      for (var i = 0; i < data.length; i++) {                          
                        table = $("<tr><td>"+data[i]['gid']+"</td><td><img src='/uploads/goods/"+data[i]['pic']+"' width='50px'/></td><td>"+data[i]['name']+"</td><td>"+data[i]['price']+"</td><td>"+data[i]['num']+"</td></tr>");
                        $('#t').append(table);                            
                      }
                  });
              });
              //点击改变订单状态
              function change(t,id,status){
                // alert(id+'-'+status);
                //修改样式
                $(t).removeClass();
                if(status == 0){
                  //修改自己的样式
                  $(t).addClass('label label-danger');                    
                }else if(status == 1){
                  $(t).addClass('label label-primary');
                }else if(status == 2){
                  $(t).addClass('label label-info');
                }else if(status == 3){
                  $(t).addClass('label label-warning');
                }else{
                  $(t).addClass('label label-success');
                }
                //修改兄弟的样式
                $(t).siblings().attr('class','label label-default');
                $.get('/adminorder/'+id+'/edit',{status:status},function(data){
                  // console.log(data);                  
                });
              }
              //分页，并设置样式
              $('#page').children('button').eq(0).attr('class','btn btn-warning active');
              function page(t,p){
                //ajax请求数据
                $.get('/adminorder',{page:p},function(data){
                  // alert(data);
                  $('.table').html(data);
                  $(t).attr('class','btn btn-warning active');
                  $(t).siblings().attr('class','btn btn-default');
                });                
              }    
          </script>         
         </div>
        
        </div>
       
       </section>
      
      </section>
@endsection
     
  </section>
    
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/js/jquery-1.8.3.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/static/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="/static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/static/admin/js/jquery.sparkline.js"></script>
    <script src="/static/admin/js/bootstrap-switch.js"></script>
    <script src="/static/admin/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/static/admin/js/jquery.tagsinput.js"></script>
    <script type="text/javascript" src="/static/admin/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <!--common script for all pages-->
    <script src="/static/admin/js/common-scripts.js"></script>
    <script type="text/javascript" src="/static/admin/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/static/admin/js/gritter-conf.js"></script>

  </script>
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        });
    </script>
  </body>
</html>
