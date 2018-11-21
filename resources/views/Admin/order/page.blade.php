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
              // $('#mymodal').on('show.bs.modal',function(e) {
              //     //初始化模态框                          
              //     $('#sortable').empty();
              //     var id = $(e.relatedTarget).data('orderid');
              //     // console.log(id);
              //     //ajax获取当前用户的地址数据
              //     $.get('/adminuser/' + id,
              //     function(data) {
              //         // console.log(typeof data);//json字符串
              //         data = eval(data); //js对象
              //         if (data.length == 0) {
              //             $('#sortable').append('<div>暂无数据！</div>');
              //         } else {
              //             for (var i = 0; i < data.length; i++) {
              //                 // console.log(data[i]);
              //                 str1 = data[i]['name'] + ' ' + data[i]['phone'];
              //                 str2 = data[i]['huo'] + '/' + data[i]['city'] + '/' + data[i]['adds'];
              //                 li = $("<li class='list-warning'><i class='fa fa-ellipsis-v'></i><span class='task-title-sp'>" + str1 + "</span><br/><span class='task-title-sp'>" + str2 + "</span></li>");
              //                 $('#sortable').append(li);
              //             }
              //         }
              //     });
              // });
              </script>         
            </tbody> 
           </table> 