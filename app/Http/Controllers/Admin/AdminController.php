<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Http\Requests\Adminlogin;

class AdminController extends Controller
{
    //后台首页加载
    public function index(){
    	return view('Admin.index');
    }
    public function login(){
    	return view('Admin.login');
    }
    public function dologin(Request $request){
    	// var_dump($request->all());
    	$data = $request->except('_token');
    	$info = DB::table('admin')->where('name','=',$data['name'])->first();
    	// dd($data['password'].'<br/>'.$info->password);
        // dd(Hash::check($info->password,$data['password']));
    	if($info){
            // dd('ok');
    		//检测密码
    		if(Hash::check($data['password'],$info->password)){
                //1.获取用户的所有权限信息
                $sql = "select n.name,n.mname,n.aname from admin_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and ur.uid={$info->id}";
                $list = DB::select($sql);
                //2.初始化权限(所有管理员都拥有访问后台首页的权限)
                $nodelist['AdminController'][] = 'index';
                //遍历
                foreach($list as $key=>$value){
                    //将当前用户的所有权限存储于$nodelist
                    $nodelist[$value->mname][] = $value->aname;
                    //如果存在create和edit方法
                    if($value->aname == 'create')
                        $nodelist[$value->mname][] = 'store';
                    if($value->aname == 'edit')
                        $nodelist[$value->mname][] = 'update';
                    // 如果存在role和auth方法
                    if($value->aname == 'role')
                        $nodelist[$value->mname][] = 'saverole';
                    if($value->aname == 'auth')
                        $nodelist[$value->mname][] = 'saveauth';
                } 
                // dd($nodelist);
    			//将用户信息和用户权限存储于session
    			session(['admin'=>$info->name,'nodelist'=>$nodelist]);
    			return redirect('/admin')->with('login','欢迎登录ETRO STORES后台管理系统！');
    		}else{
    			return back()->with('error','密码有误');
    		}
    		
    	}else{
    		return back()->with('error','用户名有误');
    	}
    	// dd($data);
    }
    public function loginout(Request $request){
        // var_dump(session()->all());
        //从session中删除admin和nodelist
        $request->session()->pull('admin');
        $request->session()->pull('nodelist');
        return redirect('/adminlogin');
    }
    //修改各表格中状态 传入参数：操作的数据表、数据id
    public function status(Request $request){
        $status = $request->input('status');
        $id = $request->input('id');
        $table = $request->input('table');
        if(DB::table($table)->where('id','=',$id)->update(['status'=>$status])){
            echo '修改状态成功';  
        }else{
            echo '修改状态失败';
        }
    }
}
