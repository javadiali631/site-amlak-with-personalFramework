<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Category;
use App\Comment;
use App\Http\Requests\Admin\CommentRequest;
use App\Post;
use App\Slide;
use System\Database\DBBuilder\DBBuilder;

class HomeController extends Controller
{

    public function index(){
        $slides = Slide::all();
        $newestAds = Ads::orderBy('created_at', 'desc')->limit(0, 6)->get();
        $bestAds = Ads::orderBy('view', 'desc')->orderBy('created_at', 'desc')->limit(0, 4)->get();
        $posts = Post::where('published_at', '<=', date('Y-m-d H:i:s'))->orderBy('created_at', 'desc')->limit(0, 4)->get();
        return view('app.index', compact('posts', 'slides', 'newestAds', 'bestAds'));
    }

    public function about(){
        return view('app.about');
    }

    public function allAds(){
        $ads = Ads::all();
        return view('app.all-ads', compact('ads'));
    }


    public function ads($id){
        $advertise = Ads::find($id);
        $galleries = $advertise->galleries()->get();
        $posts = Post::where('published_at', '<=', date('Y-m-d H:i:s'))->orderBy('created_at', 'desc')->limit(0, 4)->get();
        $relatedAds = Ads::where('cat_id', $advertise->cat_id)->where('id', '!=', $id)->orderBy('created_at', 'desc')->limit(0, 2)->get();
        $categories = Category::all();
        return view('app.ads', compact('advertise', 'galleries', 'posts', 'relatedAds', 'categories'));
    }

    public function allPost(){
        $posts = Post::all();
        return view('app.all-post', compact('posts'));
    }

    
    public function post($id){
        $post = Post::find($id);
        $posts = Post::where('published_at', '<=', date('Y-m-d H:i:s'))->orderBy('created_at', 'desc')->limit(0,4)->get();
        $categories = Category::all();
        
        return view('app.post', compact('posts', 'post','categories'));
    }

    public function comment(){
        $request = new CommentRequest;
        $inputs = $request->all();
        Comment::create($inputs);
        return back();
    }

    public function category($id){
        $category = Category::find($id);
        $ads = $category->ads()->get();
        $posts = $category->posts()->get();

        return view('app.category', compact('category', 'ads', 'posts'));
    }

    public function search(){
        if(isset($_GET['search'])){
            $search = '%' . $_GET['search'] . '%';
            $ads = Ads::where('title', 'LIKE', $search)->whereOr('tag', 'LIKE', $search)->get();
            $posts = Post::where('title', 'LIKE', $search)->get();
            return view('app.search', compact('ads', 'posts'));
        }else{
            return back();
        }
    }

    public function ajaxLastPost(){
             //get data
             $posts = Post::where('published_at', '<=', date('Y-m-d H:i:s'))->orderBy('created_at', 'desc')->limit(0,4)->get();
             foreach($posts as $post)
             {
                 $post->user = $post->user()->first_name . ' ' . $post->user()->last_name;
                 unset($post->user_id);
                 $post->created_at = \Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %d، %Y');
                 $post->url = route('home.post', [$post->id]);
             }
     
             header('Content-type: application/json');
             $result = json_encode($posts, JSON_UNESCAPED_UNICODE);
             echo $result;
             exit;
         }

    

}