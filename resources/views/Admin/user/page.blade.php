
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
                      <button class="btn btn-warning btn-xs" data-orderId="{{$value->id}}" data-toggle="modal" data-target="#mymodal">
                        <span class="glyphicon glyphicon-map-marker"></span>
                      </button>                      
                    </td>
                    <td>&nbsp;&nbsp;</td>
                    <!-- <td>
                      <a href="" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                      </a> 
                    </td>   -->                  
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
             <div class="modal fade" id="mymodal"> 
               <div class="modal-dialog"> 
                <div class="modal-content"> 
                 <!-- 这是模态框的头 --> 
                 <div class="modal-header"> 
                  <!-- 关闭modal框的 data-dismiss --> 
                  <button class="close" data-dismiss="modal">&times;</button> 
                  <h4 class="modal-title">&gt;收货地址</h4> 
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
                            $('#sortable').html('暂无数据！');
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