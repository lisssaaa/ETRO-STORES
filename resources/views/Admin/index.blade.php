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
    <link rel="stylesheet" type="text/css" href="/static/admin/lineicons/style.css">    
    
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

              <!-- <div class="row"> -->
                  <div class="col-lg-9 main-chart">             
                  		 
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                      	<div class="col-md-12 col-sm-12 mb">
                      		<div class="white-panel pn donut-chart">
                      			
								            <div class="weather pn">
                              <br/>
                              <br/>
                              <br/>
                              <br/>
                              <h2 id="time"></h2>
                              <script>
                                setInterval(function(){
                                  var date = new Date();
                                  var time = document.getElementById('time');
                                  year = date.getFullYear();
                                  month = date.getMonth()+1;
                                  day = date.getDate();
                                  hour = date.getHours();
                                  minute = date.getMinutes();
                                  seconds = date.getSeconds();
                                  weekday = date.getDay();

                                  //格式化seconds、minute、day、hour、month
                                  seconds = seconds>9?seconds:'0'+seconds;
                                  minute = minute>9?minute:'0'+minute;
                                  day = day>9?day:'0'+day;
                                  hour = hour>9?hour:'0'+hour;
                                  month = month>9?month:'0'+month;
                                  switch(weekday)
                                  {
                                    case 1:weekday = '一';break;
                                    case 2:weekday = '二';break;
                                    case 3:weekday = '三';break;
                                    case 4:weekday = '四';break;
                                    case 5:weekday = '五';break;
                                    case 6:weekday = '六';break;
                                    case 0:weekday = '日';break;
                                  }

                                  str = year + '/' + month + '/' + day + ' ' + hour + ':' + minute + ':' + seconds + ' 星期' + weekday;
                                  time.innerHTML = str;
                                },1000);
                                

                              </script>
                              <div style="position:absolute;left:350px;top:30px">
                                  <iframe width="200" scrolling="no" height="200" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1">
                                </iframe>
                              </div>
                            </div>
								
								
	                      	</div>
                      	</div><!-- /col-md-4-->
                    </div><!-- /row -->
                    <!-- CALENDAR-->                   
                </div><!-- /col-lg-9 END SECTION MIDDLE -->

                  <div class="col-lg-3 ds">              
						      
                       <!-- 成员列表 -->
						          <h3>小组成员</h3>
                      <!-- First Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="/static/admin/img/ui-divya.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">朱丽莎</a><br/>
                      		   <muted>组长</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Second Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="/static/admin/img/ui-sherman.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">潘玉娇</a><br/>
                      		   <muted>组员</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Third Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="/static/admin/img/ui-danro.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">张双林</a><br/>
                      		   <muted>组员</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Fourth Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="/static/admin/img/ui-zac.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">白泽瑞</a><br/>
                      		   <muted>组员</muted>
                      		</p>
                      	</div>
                      </div>
                      <!-- Fifth Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<img class="img-circle" src="/static/admin/img/ui-sam.jpg" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><a href="#">赵子瑜</a><br/>
                      		   <muted>组员</muted>
                      		</p>
                      	</div>
                      </div>
  
                  </div><!-- /col-lg-3 -->
              
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
@endsection
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/js/jquery-1.8.3.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/static/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/static/admin/js/jquery.scrollTo.min.js"></script>
    <script src="/static/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/static/admin/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="/static/admin/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="/static/admin/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/static/admin/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="/static/admin/js/sparkline-chart.js"></script>    
	  <script src="/static/admin/js/zabuto_calendar.js"></script>	
	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
