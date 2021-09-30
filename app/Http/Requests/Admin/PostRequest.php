<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class PostRequest extends Request
{
    public function rules(){
        if(methodField() == 'put'){
            return [
                'title' => "required|max:191",
                'body' => "required",
                'cat_id' => 'required|exist:categoreis,id',
                'published_at' => 'required|date',
                'image' => 'file|mimes:jpeg,jpg,png,gif',
            ];
        }else{
            return [
                'title' => "required|max:191",
                'body' => "required",
                'cat_id' => 'required|exist:categoreis,id',
                'published_at' => 'required|date',
                'image' => 'required|file|mimes:jpeg,jpg,png,gif',
            ];
        }
     
    }
}