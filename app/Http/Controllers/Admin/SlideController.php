<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Requests\Admin\SlideRequest;
use App\Http\Services\ImageUpload;
use App\Post;
use App\Slide;
use PDO;
use System\Auth\Auth;
use System\Database\DBConnection\DBConnection;
use System\Request\Request;

class SlideController extends AdminController
{

  public function index()
  {
    
    $slides = Slide::all();
    return view('admin.slide.index', compact('slides'));
  }

  public function create()
  {
    
    return view('admin.slide.create');
  }

  public function store()
  {
    $request = new SlideRequest();
    $inputs = $request->all();
    $inputs['user_id'] = Auth::user()->id;
    $path = "images/slides/" . date('Y/M/d');
    $name = date('Y_m_d_H_i_s_') . rand(10, 99);
    $inputs['image'] = ImageUpload::uploadAndFitImage($request->file('image'), $path, $name, 800, 499);
    Slide::create($inputs);
    return redirect('admin/slide');
  }

  public function edit($id)
  {
    $slide = Slide::find($id);
    
    return view('admin.slide.edit', compact('slide'));
  }
  public function statusChange($id)
  {
    $post = Post::find($id);
    if ($post->status == 0) {
      Post::update(['status' => 1, 'id' => $id]);
    } else {
      Post::update(['status' => 0, 'id' => $id]);
    }
    return redirect('admin/post');
  }

  public function update($id)
  {
    $request = new SlideRequest();
    $inputs = $request->all();
    $inputs['user_id'] = Auth::user()->id;
    $inputs['id'] = $id;
    if ($inputs['image'] != null) {

   
      $path = "images/slides/" . date('Y/M/d');
      $name = date('Y_m_d_H_i_s_') . rand(10, 99);
      $inputs['image'] = ImageUpload::uploadAndFitImage($request->file('image'), $path, $name, 800, 499);
    }
    Slide::create($inputs);
    return redirect('admin/slide');



  }

  public function destroy($id)
  {
    Slide::delete($id);
    return back();
  }
}
