<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentStaff;

class StudentStaffController extends Controller
{
    public function index (Request $req){
        $studentstaffs = StudentStaff::orderBy('id','ASC')->get();
        return view ('studentStaff.index',compact('studentstaffs'));  
    }

    public function create(){
        return view ('studentStaff.create',compact('studentstaffs'));
    }

    public function store(Request $request)
    {
        StudentStaff::create($request->all());
        return redirect()->route('studentStaff.index');
    }

    public function edit($id){
        $studentstaffs = StudentStaff::find($id);
        return view('studentStaff.edit', compact('studentstaffs'));
    }

    public function update(Request $request, $id)
    {
        StudentStaff::find($id)->update($request->all());
        return redirect()->route('studentStaff.index');
    }

    public function updateStatus(StudentStaff $studentstaffs)
    {
        $studentstaffs->update([
            'status' => "0",
        ]);
        return redirect()->route('studentStaff.index');
    }

    public function destroy($id){
        StudentStaff::find($id)->delete();
        return redirect()->route('studentStaff.index');
    }
}
