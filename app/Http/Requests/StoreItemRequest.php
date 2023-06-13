<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
        return [
            "name" => "required|min:3|max:30|unique:items,name,",
            "price" => "required|numeric|gt:30",
            "stock" => "required|numeric|gt:3",
        ];
    }

    public function messages () : array
    {
        return [
            "name.required" => "နာမည်ထည့်ဦးဟ ကျန်ခဲ့ပြီ .....",
            "name.min" => "ကျေးဇူးပြုပြီး နာမည်ကို သုံးလုံးလောက်ထည့်ပေးလေနော် .... "
        ];
    }
}
