<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Roleinsert extends FormRequest
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
        return [
            'name'=>'required|unique:role',
            'status'=>'required',
        ];
    }
    //自定义错误消息
    public function messages(){
        return [
                'name.required'=>'角色名不能为空',
                'name.unique'=>'角色名重复',
                'status.required'=>'角色状态不能为空',
                ];
    }
}
