<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k = $request->input('keywords');
        //获取数据
        $auth = DB::table('node')->where('name','like','%'.$k.'%')->paginate(6);
        return view('Admin.auth.index',['auth'=>$auth,'k'=>$k]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.auth.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if(DB::table('node')->insert($data)){
            return redirect('/adminauths')->with('success','权限添加成功');
        }else{
             return redirect('/adminauths/create')->with('error','权限添加失败');
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
        $data = DB::table('node')->where('id','=',$id)->first();
        // dd($data);
        return view('Admin.auth.edit',['data'=>$data]);
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
        $data = $request->except(['_token','_method']);
        
        if(DB::table('node')->where('id','=',$id)->update($data)){
            return redirect('/adminauths')->with('success','权限修改成功');
        }else{
            return redirect('/adminauths')->with('error','权限修改失败');
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
        if(DB::table('node')->where('id','=',$id)->delete()){
            return redirect('/adminauths')->with('success','权限删除成功');
        }else{
            return redirect('/adminauths')->with('error','权限删除失败');
        }
    }
}
