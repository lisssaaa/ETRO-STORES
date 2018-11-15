<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Roleinsert;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k = $request->input('keywords');
        $roles = DB::table('role')->where('name','like','%'.$k.'%')->paginate(6);
        return view('Admin.role.index',['roles'=>$roles,'k'=>$k]);
    }
    //分配权限
    public function auth($rid)
    {
        //获取所有权限信息
        $auth = DB::table('node')->get();
        //获取角色信息
        $info = DB::table('role')->where('id','=',$rid)->first();
        //获取当前角色已拥有权限
        $data = DB::table('role_node')->where('rid','=',$rid)->get();
        if(count($data)){
            foreach($data as $value){
                $nid[] = $value->nid; 
            }
            return view('Admin.role.auth',['info'=>$info,'auth'=>$auth,'nid'=>$nid]);
        }else{
            return view('Admin.role.auth',['info'=>$info,'auth'=>$auth,'nid'=>array()]);
        }
    }
    //保存权限
    public function saveauth(Request $request,$rid){
        // echo $rid;
        // dd($request->only('nid'));
        $data = $request->only('nid');
        //删除原有的权限
        DB::table('role_node')->where('rid','=',$rid)->delete();
        //遍历data，uid--rid 逐条存入admin_role
        foreach ($data['nid'] as $value) { 
            $names[] = DB::table('node')->where('id','=',$value)->first()->name;               
            DB::table('role_node')->insert(['rid'=>$rid,'nid'=>$value]);
        }
        //将权限节点名用逗号分隔存入role表中的remark字段
        $str = join(',',$names);
        DB::table('role')->where('id','=',$rid)->update(['remark'=>$str]);
        return redirect('/adminroles')->with('success','分配权限成功');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('Admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Roleinsert $request)
    {
        $data = $request->except('_token');
        if(DB::table('role')->insert($data)){
            return redirect('/adminroles')->with('success','添加角色成功');
        }else{
            return redirect('/adminroles/create')->with('error','添加角色失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除role表和role_node表中的数据
        if(DB::table('role')->where('id','=',$id)->delete() && DB::table('role_node')->where('rid','=',$id)->delete()){
            return redirect('/adminroles')->with('success','角色删除成功');
        }else{
            return redirect('/adminroles')->with('error','角色删除失败');
        }
    }
}
