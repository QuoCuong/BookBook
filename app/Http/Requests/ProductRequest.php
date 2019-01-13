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
            'quantity'       => 'required|numeric',
            'price'          => 'required|numeric',
            'category_id'    => 'required',
            'images'         => 'required|array',
            'images.*'         => 'image',
            'author'         => 'required',
            'publisher'      => 'required',
            'publish_year'   => 'required|numeric',
            'weight'         => 'required',
            'size'           => 'required',
            'number_of_page' => 'required',
            'cover'          => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name_product.required'   => 'Tên sách không được để trống!',
            'name_image.required'     => 'Tên hình ảnh không được để trống!',
            'description.required'    => 'Mô tả sản phẩm không được để trống!',
            'quantity.required'       => 'Số lượng không được để trống!',
            'quantity.numeric'        => 'Số lượng phải là một số!',
            'price.required'          => 'Giá không được để trống!',
            'price.numeric'           => 'Giá phải là một số!',
            'category_id.required'    => 'Danh mục không được để trống!',
            'images.required'         => 'Trường hình ảnh không được để trống!',
            'images.image'            => 'Không phải là hình ảnh!',
            'author.required'         => 'Tác giả không được để trống!',
            'publisher.required'      => 'Nhà xuất bản không được để trống!',
            'publish_year.required'   => 'Năm xuất bản không được để trống!',
            'publish_year.numeric'     => 'Năm sản xuất phải là một số!',
            'weight.required'         => 'Trọng lượng không được để trống!',
            'size.required'           => 'Khổ giấy không được để trống!',
            'number_of_page.required' => 'Số trang không được để trống!',
            'cover.required'          => 'Chất liệu không được để trống!',

        ];
    }
}
