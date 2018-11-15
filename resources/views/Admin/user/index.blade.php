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
        <h3><i class="fa fa-angle-right"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 会员管理</font></font></h3> 
        
        <!-- row --> 
        <div class="row mt"> 
         <div class="col-md-12"> 
          <div class="content-panel">
          &nbsp;&nbsp;&nbsp; 
            <div class="btn-group">
              <div class="btn-group">
                <a href="/adminuser" class="btn btn-warning active"><span class="fa fa-tasks"></span>&nbsp;&nbsp;<font style="vertical-align: inherit;">会员列表</font></a>
              </div>
              <!-- <div class="btn-group">
                <a href="/adminuser/create" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;<font style="vertical-align: inherit;">添加会员</font></a>
              </div>     -->          
            </div>
            <div class="col-md-offset-9">
            <form class="form-inline" action="/adminuser" method="get">
                <div class="input-group">           
                  <input type="text" class="form-control" name="keywords" value="{{$k or ''}}" id="exampleInputName2" placeholder="请输入关键字">
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
              <th class="hidden-phone"><i class="fa fa-question-circle"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 会员名</font></font></th> 
              <th><span class="glyphicon glyphicon-envelope"></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 邮箱</font></font></th> 
              <th><i class="fa fa-bookmark"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 添加时间</font></font></th>
              <th><i class=" fa fa-edit"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 状态</font></font></th> 
              <th></th> 
             </tr> 
            </thead> 
            <tbody> 
              @foreach($user as $key=>$value)
             <tr> 
              <td><a href="basic_table.html#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$key+1}}</font></font></a></td> 
              <td class="hidden-phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->username}}</font></font></td> 
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->email}}</font></font></td> 
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->addtime}}</font></font></td>
              <td>
                <input type="checkbox" onchange="change(this,{{$value->id}})" class="switch_1" @if($value->status==0) checked @endif>           
              </td>    
                            
              <td> 
                <table border="0px">
                  <tr>
                    <td>
                      <button class="btn btn-primary btn-xs" data-orderId="{{$value->id}}" data-toggle="modal" data-target="#mymodal">
                        <span class="glyphicon glyphicon-map-marker"></span>
                      </button>
                    </td>
                    <td>&nbsp;&nbsp;</td>
                    <!-- <td>
                      <a href="/adminuser/{{$value->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                      </a> 
                    </td> -->                    
                    <td>
                      <form action="/adminuser/{{$value->id}}" method="post">
                      {{method_field('DELETE')}}
                      {{csrf_field()}}
                        <button type="submit" class="btn btn-danger btn-xs">
                          <i class="fa fa-trash-o"></i>
                        </button>                  
                      </form>
                    </td>
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
                  <h3>&gt;收货地址</h3> 
                 </div> 
                 <!-- 地址数据--> 
                 <div style="height:500px; overflow:auto;"> 
                  <div class="task-content"> 
                   <ul id="sortable" class="task-list ui-sortable"> 
                    <!-- <li class="list-warning"> <i class=" fa fa-ellipsis-v"></i>  
                          <span class="task-title-sp">test</span><br/>
                          <span class="task-title-sp">test</span>
                         </li> --> 
                   </ul> 
                  </div> 
                 </div> 
                </div> 
               </div> 
              </div>         
             <!-- 地址列表结束 -->
             <script>
              $('#mymodal').on('show.bs.modal',function(e) {
                  //初始化模态框                          
                  $('#sortable').empty();
                  var id = $(e.relatedTarget).data('orderid');
                  // console.log(id);
                  //ajax获取当前用户的地址数据
                  $.get('/adminuser/' + id,
                  function(data) {
                      // console.log(typeof data);//json字符串
                      data = eval(data); //js对象
                      if (data.length == 0) {
                          $('#sortable').append('<div>暂无数据！</div>');
                      } else {
                          for (var i = 0; i < data.length; i++) {
                              // console.log(data[i]);
                              str1 = data[i]['name'] + ' ' + data[i]['phone'];
                              str2 = data[i]['huo'] + '/' + data[i]['city'] + '/' + data[i]['adds'];
                              li = $("<li class='list-warning'><i class='fa fa-ellipsis-v'></i><span class='task-title-sp'>" + str1 + "</span><br/><span class='task-title-sp'>" + str2 + "</span></li>");
                              $('#sortable').append(li);
                          }
                      }
                  });
              });
              </script>         
            </tbody> 
           </table> 
            <br/>
            @if(!$k)
           <div class="btn-group btn-group-sm" role="group" id="page">
           @foreach($p as $v)           
            <button onclick="page(this,{{$v}})" class="btn btn-default">{{$v}}</button>          
           @endforeach   
           </div>
           @endif
           
           <script type='text/javascript'> 

              //会员状态切换
              function change(obj,id){
                // ajax切换状态            
                //查看开关状态 checked/undefined
                bool = $(obj).attr('checked');
                //取消选中，即原状态为0，设置修改后的值为1
                //选中，即原状态为1，设置修改后的值为0
                status = bool?1:0;  
                // alert(status);           
                //ajax请求函数修改数据               
                $.get('/changestatus',{table:'users',id:id,status:status},function(data){
                  $(obj).attr('checked',!$(obj).attr('checked'));
                  alert(data);
                });
              }  

              //分页，并设置样式
              $('#page').children('button').eq(0).attr('class','btn btn-warning');
              function page(t,p){
                //ajax请求数据
                $.get('/adminuser',{page:p},function(data){
                  $('.table').html(data);
                  $(t).attr('class','btn btn-warning');
                  $(t).siblings().attr('class','btn btn-default');
                });                
              }    
              
           </script>
           <br/>
           <br/>          
          </div>
         
         </div>
        
        </div>
       
       </section>
      
      </section>
@endsection
     
  </section>
    <!-- 开关 -->
    <script type="text/javascript" src="/static/admin/js/SimpleSwitch.min.js"></script>
        <script type="text/javascript">
            SimpleSwitch.init();
        </script>
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
        
        
        // function myNavFunction(id) {
        //     $("#date-popover").hide();
        //     var nav = $("#" + id).data("navigation");
        //     var to = $("#" + id).data("to");
        //     console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        // }
    </script>
  </body>
</html>
