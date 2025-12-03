<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
         'last_name' => ['required', 'string', 'max:8'],
         'first_name' => ['required', 'string', 'max:8'],
         'email' => ['required','email'],
         'tel_1' => ['required', 'numeric', 'digits_between:1,5'],
         'tel_2' => ['required', 'numeric', 'digits_between:1,5'],
         'tel_3' => ['required', 'numeric', 'digits_between:1,5'],
         'address' => ['required'],
         'category_id' => ['required'],
         'detail' =>  ['required','max:120'],
         'channel_ids' => ['required'],
        ];
    }

 public function messages()
    {
        return [
         'last_name.required' => '苗字を入力してください',
         'last_name.string' =>'文字列で入力してください',
         'last_name.max:8' =>'名前を8文字以内で入力してください',
         'first_name.required' => '名前を入力してください',
         'first_name.string' => '文字列で入力してください',
         'first_name.max:8' => '名前を8文字以内で入力してください',
         'email.required' => 'メールアドレスを入力してください',
         'email.email' => '有効なメールアドレス形式を入力してください',
         'tel_1.required' => '電話番号を入力してください',
         'tel_1.numeric' => '電話番号を数値で入力してください',
         'tel_1.digits:5' => '電話番号を5桁以内で入力してください',
         'tel_2.required' => '電話番号を入力してください',
         'tel_2.numeric' => '電話番号を数値で入力してください',
         'tel_2.digits:5' => '電話番号を5桁以内で入力してください',
         'tel_3.required' => '電話番号を入力してください',
         'tel_3.numeric' => '電話番号を数値で入力してください',
         'tel_3.digits:5' => '電話番号を5桁以内で入力してください',
         'address.required' => '住所を入力してください',
         'category_id.required' =>'お問い合わせの種類を選択してください',
         'detail.required' => 'お問い合わせ内容を入力してください',
         'detail.max:120' =>'お問い合わせ内容を120文字以内で入力してください',
         'channel_ids.required' => 'どこで知りましたかを1つ以上選択してください',
        //  'channel_ids.array' => 'どこで知りましたかの形式が不正です',
        ];
    }
}