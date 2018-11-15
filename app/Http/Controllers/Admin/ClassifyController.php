<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入DB
use DB;
use App\Http\Requests\AdminClassify;
class ClassifyController extends Controller
{
    /**
     *
     获取所有排序后分类的函数
     *
     */
    public function getcates($cate){        
        //遍历，根据path字段的逗号个数区分分类的级别，并拼接上对应个数的◆◆|
        foreach($cate as $key=>$value){        
            //转换为数组
            $arr=explode(",",$value->path);
            
            //获取逗号个数
            $len=count($arr)-2;
            //字符串重复函数
            $cate[$key]->name=str_repeat("◆◆|",$len).$value->name;
        } 
        return $cate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索关键字
        $k = $request->input('keywords');
        //拼接path和id起名为paths，并以paths排序，得到父类1，1的子类，父类2，2的子类。。。排序效果
        // $data=DB::select("select *,concat(path,'',id) as paths from type order by paths");
        // dd($data);
        //连贯操作
        $data=DB::table("type")->select(DB::raw('*,concat(path,"",id) as paths'))->where('name','like','%'.$k.'%')->orderBy('paths')->paginate(5);
        $cate = $this->getcates($data);  
        // dd($cate);
        //加载模板并传参
        return view('Admin.classify.index',['cate'=>$cate,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //通过自定义函数获取所有分类数据
        $data=DB::table("type")->select(DB::raw('*,concat(path,"",id) as paths'))->orderBy('paths')->get();
        $cate = $this->getcates($data);        
        return view('Admin.classify.add',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminClassify $request)
    {
        //获取请求数据name pid
        // dd($request->all());
        $pid = $request->input('pid');
        $data = $request->only(['name','pid']);
        $data['display'] = 0;
        //若添加顶级分类，即pid=0
        if($pid == 0){            
            //path字段： 0,
            $data['path'] = $pid.',';                    
        }else{
            //添加子分类
            //获取父类id,拼接path
            $info = DB::table('type')->where('id','=',$pid)->first();            
            $data['path'] = $info->path.$info->id.',';          
        }
         //添加数据库
        if(DB::table('type')->insert($data)){
            return redirect('/adminclassify')->with('success','分类添加成功');
        }else{
            return redirect('/adminclassify/create')->with('error','分类添加失败');
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
        //获取所有分类信息
        $info=DB::table("type")->select(DB::raw('*,concat(path,"",id) as paths'))->orderBy('paths')->get();
        $cate = $this->getcates($info);
        foreach($cate as $v){
            $ids[] = $v->id; 
        }
        // dd($ids);
        //获取当前分类信息
        $data = DB::table('type')->where('id','=',$id)->first();
        // dd($data);
        //加载编辑模板
        return view('Admin.classify.edit',['cate'=>$cate,'data'=>$data,'ids'=>$ids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminClassify $request, $id)
    {
        //获取请求数据name pid
        // dd($request->all());
        $pid = $request->input('pid');
        $data = $request->only(['name','pid']);
        //若修改为顶级分类，即pid=0
        if($pid == 0){            
            //path字段： 0,
            $data['path'] = $pid.',';                    
        }else{
            //添加子分类
            //获取父类id,拼接path
            $info = DB::table('type')->where('id','=',$pid)->first();            
            $data['path'] = $info->path.$info->id.',';          
        }
         //添加数据库
        if(DB::table('type')->where('id','=',$id)->update($data)){
            return redirect('/adminclassify')->with('success','分类修改成功');
        }else{
            return redirect('/adminclassify/{$id}/edit')->with('error','分类修改失败');
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
        // echo $id;
        //获取当前类别下子类个数
        $num = DB::table('type')->where('pid','=',$id)->count();
        if($num > 0){
            return redirect('/adminclassify')->with('error','当前类别下包含子类，请先删除子类');
        }
        //执行删除
        if(DB::table('type')->where('id','=',$id)->delete()){
            return redirect('/adminclassify')->with('success','分类删除成功');
        }

    }

    public function del(Request $request){
       $ids = $request->input('ids');
       // echo json_encode($ids);
       $i = 0;
       foreach($ids as $id){
         DB::table('type')->where('id','=',$id)->delete();      
         $i++;
       }
        echo '成功删除'.$i.'项数据';
    }    
}
