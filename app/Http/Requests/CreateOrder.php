<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrder extends FormRequest
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
            'tel' => 'required',
            'date' => 'required|after_or_equal:today',
            'time' => 'required',
            'name' => 'required',
            'total' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'tel' => '電話番号',
            'date' => '受け取り日',
            'time' => '受け取り時間',
            'name' => '受け取り者',
            'total' => '合計金額',
        ];
    }

    public function messages()
    {
        return [
            'date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
