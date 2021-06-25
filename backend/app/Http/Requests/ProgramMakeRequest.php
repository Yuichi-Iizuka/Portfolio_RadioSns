<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramMakeRequest extends FormRequest
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
     * 番組作成のバリデーション
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'body' => 'required|max:200',
            'tag' => 'required|max:50',
            'start_date' => 'required',
            'start_time' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
            'tag' => 'タグ',
            'start_date' => '日付',
            'start_time' => '時間',
        ];
    }

    // /** 
    // *番組作成のバリデーションのメッセージ
    // *
    // *@return array
    // */
    // public function messages()
    // {
    //     return [
    //         'title.required' => '入力は必須です',
    //         'title.max' => '50文字以内で入力してください',
    //         'body.required'=> '入力は必須です',
    //         'body.max' => '200文字以内で入力してください',
    //         'tag.required' => '入力は必須です',
    //         'tag.max' => '50文字以内で入力してください',
    //         'start_date.required' => '入力は必須です',
    //         'start_time.required' => '入力は必須です',
    //     ];
    // }
}
