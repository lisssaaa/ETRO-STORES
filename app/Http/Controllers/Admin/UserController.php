<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k=$request->input('keywords');
        //ajax分页
        //获取所有分页 数据总条数
        $total = DB::table('users')->count();
        //每页显示条数
        $num = 5;
        //获取最大页
        $maxpage = ceil($total/$num);
        // dd($maxpage);
        //遍历存储到数组中
        for($i=0;$i<$maxpage;$i++){
            $p[$i] = $i+1;
        }
        //获取传递页码参数
        $page = $request->input('page');
        //初始化页码
        if(empty($page)){
            $page = 1;
        }
        //select * from user limit $offset,$num:偏移量=（当前页码-1）*每页显示条数
        $offset =($page-1)*$num;
        
        $sql ="select * from users limit {$offset},{$num}";
        $sql1 ="select * from users where username like '%{$k}%' limit {$offset},{$num}";
        if($k){
            $user = DB::select($sql1);
        }else{
            $user = DB::select($sql);
        }        
        //判断是否为ajax请求
        if($request->ajax()){
            //加载模板并分配数据
            return view('Admin.user.page',['user'=>$user]);
        }
        return view('Admin.user.index',['p'=>$p,'user'=>$user,'k'=>$k]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('Admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $id;
        $addr = DB::table('address')->where('uid','=',$id)->get();
        echo json_encode($addr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('users')->where('id','=',$id)->first();
        return view('Admin.user.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除users和address数据
        if(DB::table('users')->where('id','=',$id)->delete()){
            // if(DB::table('address')->where('uid','=',$id)->delete())
            return redirect('/adminuser')->with('success','会员删除成功');
        }else{
            return redirect('/adminuser')->with('error','会员删除失败');
        }
    }

}
