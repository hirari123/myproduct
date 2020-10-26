<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 適用するパスをチェックして権限の判定を行う
        if ($this->path() == ('admin/articles' || 'admin/article/edit')) {
            return true; // trueの場合にバリデーション処理が実行される
        } else {
            return false; // falseの場合はHttpExceptionでエラーになる
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
            // バリデーションルールを定義(オーバーライド)
            'body' => 'required',
            'image_file' => 'image|mimes:jpeg,jpg,png,gif|max:3072',
        ];
    }

    // メッセージを定義(日本語化)
    public function messages()
    {
        return [
            "body.required" => "本文は必須項目です。",
            "image_file.image" => "画像ファイルを選択してください。",
            "image_file.mimes" => "JPG/PNG/GIF形式の画像を選択してください。",
            "image_file.max" => "アップロードできるファイルは3MBまでです。"
        ];
    }
}
