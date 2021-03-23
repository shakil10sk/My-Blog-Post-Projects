<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Students::all();
        $students=Students::paginate(5);
        return view('student.view',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=$request->validate([
            'name'=>'required|max:255|min:3',
            'email'=>'required|max:150|min:3',
            'phone'=>'required|unique:Students|max:11|min:11',
        ]);
        // using Eloquent  ORM
        $student=new Students;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        if ($student) {
            $notification=array(
                'message'=>'successfullt Student inserted...',
                'alert-type'=>'success'
            );
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data=Students::first()->find($id);
        $data=Students::findorfail($id);
        //return response()->json($data);
        return view('student.singleView',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Students::find($id);
        return view('student.edit',compact('data'));

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
        $validation=$request->validate([
            'name'=>'required|max:255|min:3',
            'email'=>'required|max:150|min:3',
            'phone'=>'required|max:12|min:10',
        ]);
        $student=Students::find($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        $notification=array(
            'message'=>'successfullt Student Updated...',
            'alert-type'=>'success'
        );
        return redirect()->to('/student')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Quiery Buileder Delete
        //$stuDelete= DB::table('students')->where('id',$id)->delete();
        // eloquent Delete
        $stuDelete=Students::find($id);
        $stuDelete->delete();
        $notification=array(
            'message'=>'successfullt Student Deleted...',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
