<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 本来はadminのみなのでfalse
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
            'category' => 'required',
            'name' => 'required|max: 20',
            'price' => 'required|integer',
            'text' => 'required|max: 100',
            'hot' => 'required',
            'image' => 'image|file',
        ];
    }

    public function attributes()
    {
        return [
            'category' => 'カテゴリー',
            'name' => '商品名',
            'price' => '値段',
            'text' => '商品説明',
            'hot' => '辛さ',
            'image' => '画像',
        ];
    }
}
