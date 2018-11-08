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
                } 

    			//将用户信息和用户权限存储于session
    			session(['admin'=>$info->name,'nodelist'=>$nodelist]);
    			return redirect('/admin')->with('msg','登录成功');
    		}else{
    			return back()->with('error','密码有误');
    		}
    		
    	}else{
    		return back()->with('error','用户名有误');
    	}
    	// dd($data);
    }
}
