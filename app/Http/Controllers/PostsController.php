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
    public function destroy($id){
        $data=DB::table('posts')->where('id',$id)->first();
        $imageDelete=$data->images;
        $delete=DB::table('posts')->where('id',$id)->delete();
        if ($delete) {
            unlink($imageDelete);
            $notification=array(
                'message'=>'successfullt Post Deleted...',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Ops.Somthing Goes Wrong...',
                'alert-type'=>'success'
            );
            return Redirect()->back()-with($notification);
        }

        
    }
    public function edit($id){
        $category=DB::table('categories')->get();
        $post=DB::table('posts')->where('id',$id)->first();
        return view('post.edit',compact('category','post'));

    }
    public function update(Request $request,$id){
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
            unlink($request->old_photo);
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message'=>'successfully Post Updated with Images...',
                'alert-type'=>'success'
            );
            return redirect('view/post')->with($notification);
        }else{
            $data['images']=$request->old_photo;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message'=>'successfully Post Updated. without images..',
                'alert-type'=>'success'
            );
            return redirect('view/post')->with($notification);
        }

    }
}
