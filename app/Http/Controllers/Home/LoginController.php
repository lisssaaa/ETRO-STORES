<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
//导入邮件类
use Mail;
//导入验证码三方类
use Gregwar\Captcha\CaptchaBuilder;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->except('_token');

        $info = DB::table('users')->where('username','=',$data['username'])->first();
        // dd($info);
        //获取验证码
        $fcode = $data['code'];
        $vcode = session('vcode');
        // dd($fcode.'--'.$vcode);
       
        if($fcode != $vcode){
            return back()->with('error','校验码有误,请重新输入');
        }else if($info){           
            //检测密码
            if(Hash::check($data['password'],$info->password)){
                //检查账户是否激活
                if($info->status==0){
                    session(['home'=>$info->username]);
                    return redirect('/');
                }else{
                    $this->sendmail($info->email,$info->id,$info->token);
                    echo '<h2>账号未激活，请前去邮箱激活！</h2><a style="color:orange" class="button btn-submit-login" href="https://mail.163.com">登录163邮箱>></a><br/>
                        <a style="color:orange" class="button btn-submit-login" href="https://mail.qq.com">登录qq邮箱>></a>';
                }
                
            }else{
                return back()->with('error','密码有误');
            }
        }else{
            return back()->with('error','用户名有误');
        }
    }

    //邮箱激活 发送邮件
    public function sendmail($email,$id,$token){
        //在闭包函数内部使用闭包函数外部的变量 必须use 导入
        Mail::send('Home.mail',['id'=>$id,'token'=>$token],function($message)use($email){
            //发送主题
            $message->subject('ETRO STORES用户账号激活');
            //接收方
            $message->to($email);            
        });
    }
    public function jihuo(Request $request){
        //获取id和token
        $id=$request->input('id');
        // dd($request->all());
        //获取数据表数据
        $info=DB::table("users")->where("id",'=',$id)->first();
        $token=$request->input('token');
        //把状态值 由1=》0
        //检测token参数
        if($token==$info->token){
            //封装需要修改的数据
            $res['status']=0;
            //token 重新赋值
            $res['token']=str_random(50);
            DB::table("users")->where("id",'=',$id)->update($res);
            //插入用户信息
            DB::table('user_info')->insert(['uid'=>$id]);
            return view('Home.jihuo');
        }
    }
    public function code(){
        ob_clean();//清除操作
        $builder = new CaptchaBuilder;//实例化
        $builder->build($width=150,$height=80,$font=null);//设置宽高字体
        //获取验证码内容
        $phrase = $builder->getPhrase();

        //将其存入session
        session(['vcode'=>$phrase]);
        header('Cache-control:no-cache,must-revalidate');
        header('Content-Type:image/jpeg');
        $builder->output();
        // die;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //注销
    public function create(Request $request)
    {
        $request->session()->pull('home');        
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //邮箱注册账号
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->except(['repassword','_token']);
        // dd($data);
        $data['password'] = Hash::make($data['password']);
        $data['status'] = 1;
        $data['token'] = str_random(50);
        $data['addtime'] = date('Y-m-d H:i:s',time());
        // dd($data);

        if($id = DB::table('users')->insertGetId($data)){
            $this->sendmail($data['email'],$id,$data['token']);
            return view('Home.tomail');
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
        //
    }

}
