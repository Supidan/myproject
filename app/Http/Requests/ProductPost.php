<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPost extends FormRequest
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
            'txtName' 	=> 'required|min:3',
            'txtStock' 	=> 'numeric|min:1'
        ];
    }
	
	public function attributes()
{
    return [
        'txtName' 	=> 'Product Name',
		'txtStock'	=> 'Stock'
    ];
}
}
