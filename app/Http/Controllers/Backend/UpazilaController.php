<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpazilaRequest;
use App\Model\Division;
use App\Model\Upazila;
use Illuminate\Http\Request;

class UpazilaController extends Controller
{
    public function view(){
        $data['allData'] = Upazila::orderBy('division_id','asc')->orderBy('district_id','asc')->get();
        return view('backend.upazila.view-upazila', $data);
    }
    public function add(){
        $data['divisions']=Division::all();
        return view('backend.upazila.add-upazila', $data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:upazilas,name',
        ]);
        $data = new Upazila();
        $data->division_id = $request->division_id;
        $data->district_id= $request->district_id;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('upazilas.view')->with('success', 'Data save successfully');
    }

    public function edit($id){
        $data['editData'] =Upazila::find($id);
        $data['divisions']=Division::all();
        return view('backend.upazila.add-upazila', $data);
    }

    public function update(UpazilaRequest $request, $id){
        $this->validate($request, [
            'name' => 'required|unique:upazilas,name',
        ]);
        $data = Upazila::find($id);
        $data->name = $request->name;
        $data->division_id = $request->division_id;
        $data->district_id= $request->district_id;
        $data->save();
        return redirect()->route('upazilas.view')->with('success', 'Upazila Name Update successfully');
    }

    public function delete(Request $request){
        $data = Upazila::find($request->id);
        $data ->delete();
        return back()->withSuccess('Delete SuccessFully');
    }
}
