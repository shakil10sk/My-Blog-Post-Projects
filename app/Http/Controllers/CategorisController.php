<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Categories;
use Symfony\Contracts\Service\Attribute\Required;

class CategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=Categories::all();
        $data=DB::table('categories')->get();

        return view('category.view',compact('data'));
    }
    public function singleview($id){
        $data=Categories::where('id',$id)->first();
        // return response()->json($data);
        return view('category.singleView')->with('dat',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'cname'=>'required|max:255|min:3',
            'slug'=>'required|unique:Categories|max:255|min:3',
        ]);
        $data=array();
        $data['name']=$request->cname;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data); 
        if($category){
            $notification=array(
                'message'=>'successfullt category inserted...',
                'alert-type'=>'success'
            );
            return redirect()->route('category')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something wwnt Wrong...',
                'alert-type'=>'error'
            );
        }
        // return response()->json($data);
        // echo "<pre>";
        // print_r($data);
        return redirect()->back();
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ed=DB::table('categories')->where('id',$id)->first();
        return view('category.edit',compact('ed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate=$request->validate([
            'cname'=>'required|max:255|min:3',
            'slug'=>'required|max:255|min:3',
        ]);
        $data=array();
        $data['name']=$request->cname;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id',$id)->update($data); 
        if($category){
            $notification=array(
                'message'=>'successfullt category Updated...',
                'alert-type'=>'success'
            );
            return redirect('view/category')->with($notification);
        }else{
            $notification=array(
                'message'=>'Nothing To Update...',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted=DB::table('categories')->where('id',$id)->delete();
        if($deleted){
            $notification=array(
                'message'=>'successfullt category Deleted...',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Something wwnt Wrong...',
                'alert-type'=>'error'
            );
        }
        return redirect()->back();
    }
}
