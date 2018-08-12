<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;
class UserRequest extends FormRequest
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
            //
            'name'=>'required|between:3,25|regex:/^[\w+]+$/|unique:users,name,'.Auth::id(),
            'email'=>'required|email',
            'introduction'=>'required|max:80',
            'avatar'=>'mimes:jpg,jpeg,gif,png|dimensions:min_width=200,min_height=200',
        ];
    }

    public function messages()
    {
       return [
           "name.required"=>"用户名要填写",
           "name.between"=>"用户名3到25个字",
           "name.unique"=>"用户名已经存在",
           "name.regex"=>"用户名只支持英文",
           "avatar.mimes"=>"图片只有是jpg,jpeg,gif,png才可以",
           "avatar.dimensions"=>"只能上传200*200的图片"
       ];
    }
}
