<?php

namespace Book\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_product'   => 'required',
            'name_image'     => 'required',
            'description'    => 'required',
            'quantity'       => 'required',
            'price'          => 'required',
            'subcategory_id' => 'required',
            'path'           => 'required|image',
            'author'         => 'required',
            'publisher'      => 'required',
            'publish_year'   => 'required',
            'weight'         => 'required',
            'size'           => 'required',
            'number_of_page' => 'required',
            'cover'          => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name_product.required'   => ':Attribute không được để trống!',
            'name_image.required'     => ':Attribute không được để trống!',
            'description.required'    => ':Attribute không được để trống!',
            'quantity.required'       => ':Attribute không được để trống!',
            'price.required'          => ':Attribute không được để trống!',
            'subcategory_id.required' => ':Attribute không được để trống!',
            'path.required'           => ':Attribute không được để trống!',
            'path.image'              => ':Attribute không phải là hình ảnh!',
            'author.required'         => ':Attribute không được để trống!',
            'publisher.required'      => ':Attribute không được để trống!',
            'publish_year.required'   => ':Attribute không được để trống!',
            'weight.required'         => ':Attribute không được để trống!',
            'size.required'           => ':Attribute không được để trống!',
            'number_of_page.required' => ':Attribute không được để trống!',
            'cover.required'          => ':Attribute không được để trống!',

        ];
    }
}
