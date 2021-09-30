<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class AdsRequest extends Request
{
    public function rules(){
 if(methodField() == 'put'){
    return [
        'title' => "required|max:191",
        'description' => "required|max:1000",
        'address' => "required|max:191",
        'amount' => "required|max:191",
        'image' => "file|mimes:jpeg,png,jpg,gif",
        'floor' => "required|max:191",
        'year' => "required|number",
        'storeroom' => "required|number",
        'balcony' => "required|number",
        'area' => "required",
        'room' => "required|number",
        'toilet' => "required",
        'parking' => "required|number",
        'tag' => "required",
        'cat_id' => "required|exist:categories,id",
        'sell_status' => "required|number",
        'type' => "required|number",
      
    ];
 }else{
    return [
        'title' => "required|max:191",
        'description' => "required",
        'address' => "required",
        'amount' => "required|max:191",
        'image' => "required|file|mimes:jpeg,png,jpg,gif",
        'floor' => "required|max:191",
        'year' => "required",
        'storeroom' => "required",
        'balcony' => "required",
        'area' => "required",
        'room' => "required",
        'toilet' => "required",
        'parking' => "required",
        'tag' => "required",
        'cat_id' => "required",
        'sell_status' => "required",
        'type' => "required",
      
    ];
 }
    }
}