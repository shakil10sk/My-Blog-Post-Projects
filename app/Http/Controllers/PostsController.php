<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class PostsController extends Controller
{
    public function index(){
        // $posts=DB::table('posts')->get();
        $posts=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.slug')
        ->get();
        //return response()->json($post);
        return view('post.view',compact('posts'));
        
    }

    public function create(){
        $category=DB::table('categories')->get();
        return view('post.create',compact('category'));
    }

    public function store(Request $request){
        $validate=$request->validate([
            'title'=>'required|max:150',
            'details'=>'required',
            'images'=>'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('images');
        if($image){
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='frontend/images/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['images']=$image_url;
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'successfullt Post inserted...',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'successfullt Post inserted...',
                'alert-type'=>'success'
            );
            return Redirect()->back()-with($notification);
        }

    }
    public function singleView($id)
    {
        $view=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.slug')
        ->where('posts.id',$id)
        ->first();
        // return response()->json($view);
        return view('post.singleView',compact('view'));

    }
}
