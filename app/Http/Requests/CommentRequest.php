<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 適用するパスをチェック
        if ($this->path() == ('admin/comment/create' || 'admin/comment/edit'))
        {
            return true;
        } else {
            return false; // パスが異なれば実行しない(403エラーになる)
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // バリデーションルールを定義
            'body' => 'required',
        ];
    }
}
