<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'name'=> 'required|bail',
            'country_id'=> 'required|bail',
            'brand_id'=> 'required|bail',
            'watt_id'=> 'required|bail',
            'type_id'=> 'required|bail',
            'shape_id'=> 'required|bail',
            'sale_id'=> 'required|bail',
            'unit'=> 'required|bail',
            'price'=> 'required|numeric|min:0|gte:price|bail',
            'in_stock'=> 'required|numeric|integer|min:0|bail',
            // 'picture'=> 'required|bail',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> '* Product Name cannot blank',
            // 'txtname.unique'=> '* Product Name must be unique !',
            'country.required'=> '* country cannot blank',
            'brand.required'=> '* brand cannot blank',
            'type.required'=> '* type cannot blank',
            'watt.required'=> '* watt cannot blank',
            'sale.required'=> '* sale cannot blank',
            'shape.required'=> '* shape cannot blank',
            'unit.required'=> '* unit cannot blank',
            'in_stock.required'=> '*in_stock cannot blank',
            'price.required'=> '* Sale Price cannot blank',
            'price.numeric'=> '* Sale Price must be numeric',
            'price.min'=> '* Sale Price cannot below 0',
            // 'saleprice.gte'=> '* Product Sale Price should be less than or equal Purchase Price',
            // 'purchaseprice.required'=> '* Product Purchase Price cannot blank',
            // 'purchaseprice.numeric'=> '* Product Purchase Price must be numeric',
            // 'purchaseprice.min'=> '* Product Purchase Price cannot below 0',
            // 'purchaseprice.lte'=> '* Product Purchase Price should be less than or equal Sale Price',
            // 'in_stock.required'=> '* Product in_stock cannot blank',
            // 'quantity.numeric'=> '* Product quantity must be numeric and integer',
            // 'quantity.integer'=> '* Product quantity must be numeric and integer',
            // 'quantity.min'=> '* Product quantity cannot below 0',
            // 'category.required'=> '* Category cannot blank',
            // 'picture.required'=> '* Product picture cannot blank',
        ];
    }
}
