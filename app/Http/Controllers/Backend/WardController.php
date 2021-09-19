<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\WardRequest;
use App\Model\Division;
use App\Model\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function view(){
        $data['allData'] = Ward::orderBy('division_id','asc')->orderBy('district_id','asc')->orderBy('upazila_id','asc')->orderBy('union_id','asc')->get();
        return view('backend.ward.view-ward', $data);
    }
    public function add(){
        $data['divisions']=Division::all();
        return view('backend.ward.add-ward', $data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:wards,name',
        ]);
        $data = new Ward();
        $data->division_id = $request->division_id;
        $data->district_id= $request->district_id;
        $data->upazila_id= $request->upazila_id;
        $data->union_id= $request->union_id;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('wards.view')->with('success', 'Ward save successfully');
    }

    public function edit($id){
        $data['editData'] =Ward::find($id);
        $data['divisions']=Division::all();
        return view('backend.ward.add-ward', $data);
    }

    public function update(WardRequest $request, $id){
        $this->validate($request, [
            'name' => 'required|unique:wards,name',
        ]);
        $data = Ward::find($id);
        $data->name = $request->name;
        $data->division_id = $request->division_id;
        $data->district_id= $request->district_id;
        $data->upazila_id= $request->upazila_id;
        $data->union_id= $request->union_id;
        $data->save();
        return redirect()->route('wards.view')->with('success', 'Ward Name Update successfully');
    }

    public function delete(Request $request){
        $data = Ward::find($request->id);
        $data ->delete();
        return back()->withSuccess('Delete SuccessFully');
    }
}
