<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class AdminUseredit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('adminusers');
        return [
            //获取当前编辑行的id      表名，字段，需要排除的id
            
            // 'name' => [
            //                 'required',
            //                 'regex:/\w{4,8}/',
            //                 Rule::unique('admin')->ignore(request('id')),
            //             ],4
            'name'=>'required|regex:/\w{4,8}/|unique:admin,name,'.$id,
            'password'=>'required|regex:/\w{6,18}/',
            'repassword'=>'required|regex:/\w{6,18}/|same:password',            
        ];
    }
     //自定义错误消息
    public function messages(){
        return [
                'name.required'=>'用户名不能为空',
                'name.regex'=>'用户名必须为4-8位任意的数字字母下划线',
                'name.unique'=>'用户名重复',
                'password.required'=>'密码不能为空',
                'password.regex'=>'密码必须为6-18位任意的数字字母下划线',
                'repassword.required'=>'重复密码不能为空',
                'repassword.regex'=>'重复密码必须为6-18位任意的数字字母下划线',
                'repassword.same'=>'两次密码不一致'
                //'level.required'=>'请设置用户级别',
                // 'email.email'=>'邮箱不符合格式',
                // 'phone.required'=>'电话不能为空',
                // 'phone.regex'=>'电话不符合格式',
                ];
    }
}
