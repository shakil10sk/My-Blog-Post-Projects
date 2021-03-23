<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Util\Json;
use App\Students;

class StudentController extends Controller
{
    public function create(){
        return view('student.create');
    }
    public function store(Request $request){
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
    public function index(){

        $students=Students::all();
        $students=Students::paginate(5);
        return view('student.view',compact('students'));
    }
    public function view($id){
        // $data=Students::first()->find($id);
        $data=Students::findorfail($id);
        //return response()->json($data);
        return view('student.singleView',compact('data'));
    }
    public function destroy($id){
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
    // edit student
    public function edit($id){
        $data=Students::find($id);
        return view('student.edit',compact('data'));
    }
    // Update Student
    public function update(Request $request,$id){
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
        return redirect()->back()->with($notification);

    }
}
