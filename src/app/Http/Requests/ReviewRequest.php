<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'product_id' => 'required',
            'rating' => 'integer|min:1|max:5',
            'comment'=> 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Lauks ":attribute" ir obligāts',
            'min' => 'Laukam ":attribute" jābūt vismaz :min simbolus garam',
            'max' => 'Lauks ":attribute" nedrīkst būt garāks par :max simboliem',
            'unique' => 'Šāda lauka ":attribute" vērtība jau ir reģistrēta',
        ];
    }
    public function attributes()
    {
        return [
            'product_id' => 'Grāmatas id',
            'rating' => 'Atsauksme',
            'comment' => 'Komentārs',
        ];
    }
}