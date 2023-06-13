<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = request()->item->id;

        // edit လုပ်လို့ရပြီး store request နဲ့ကွဲအောင်ရေးထားတာ သူ့ကိုယ်သူထည့်မစစ်တော့ဘူး ဒါပေမဲ့ table ထဲမှာရှိတဲ့ တခြားname တွေတော့ထည့်မရ

        return [

            "name" => "required|min:3|max:30|unique:items,name,$id",
            "price" => "required|numeric|gt:30",
            "stock" => "required|numeric|gt:3",
        ];
    }
}
