<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//导入表单校验类
use App\Http\Requests\AdminUserinsert;
use App\Http\Requests\AdminUseredit;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //获取搜索关键字
        $k = $request->input('keywords');
        $users = DB::table('admin')->where('name','like','%'.$k.'%')->paginate(5);
        return view('Admin.admin.index',['users'=>$users,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserinsert $request)
    {
        //
        $data = $request->except(['_token','repassword']);
        $data['password'] = Hash::make($data['password']);
        if(DB::table('admin')->insert($data)){
            return redirect('/adminusers')->with('success','添加成功');
        }else{
            return redirect('/adminusers')->with('error','添加失败');
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
        //查询数据
        $data = DB::table('admin')->where('id','=',$id)->first();
        //加载编辑模板
        return view('Admin.admin.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUseredit $request, $id)
    {        
        // dd($request->all());
        $data = $request->only(['name','password']);
        $data['password'] = Hash::make($data['password']);
        if(DB::table('admin')->where('id','=',$id)->update($data)){
            return redirect('/adminusers')->with('success','修改成功');
        }else{
            return redirect('/adminusers')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DB::table('admin')->where('id','=',$id)->delete()){
            return redirect('/adminusers')->with('success','删除成功');
        }else{
            return redirect('/adminusers')->with('error','删除失败');
        }
    }
}
