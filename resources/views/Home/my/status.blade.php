          <table class="table table-bordered ajax">
            @if($orders)
            @foreach($orders as $value)                        
              <tr>
                <th colspan="8" class="active order" id="">订单号：{{$value['order_num']}}</th>                                           
              </tr>
              <tr>                
                <td>
                  <table class="table table-hover">
                    @foreach($value['goods'] as $v)
                    <tr>
                      <td><img src="/uploads/goods/{{$v['gpic']}}" width="40px" alt=""></td>
                      <td>{{$v['gname']}}</td>
                      <td>{{$v['gprice']}}</td>
                      <td>{{$v['num']}}</td>  
                    </tr> 
                    @endforeach                      
                  </table>                  
                </td>                             
                <td rowspan="2">￥{{$value['total']}}</td>                
                <td rowspan="2">
                  @if($value['status']==0)
                  <span style="color:red">待付款</span>
                  @elseif($value['status']==1)
                  <span style="color:orange">待发货</span>
                  @elseif($value['status']==2)
                  <span style="color:blue">待收货</span>
                  @elseif($value['status']==3)
                  <span style="color:yellow">待评价</span>
                  @else
                  <span style="color:green">订单完成<span>
                  @endif
                </td>
                <td rowspan="2">
                  <a href="/myaccount/{{$value['id']}}">查看详细信息></a>
                </td>
              </tr> 
              @endforeach 
              @else
              <tr><td style="text-align:center">暂无数据！</td></tr>
              @endif                    
            </table> 