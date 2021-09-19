<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Model\District;
use App\Model\Division;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function view(){
        $data['allData'] = District::orderBy('division_id','asc')->get();
        return view('backend.district.view-district', $data);
    }
    public function add(){
        $data['divisions']=Division::all();
        return view('backend.district.add-district', $data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:districts,name',
        ]);
        $data = new District();
        $data->division_id = $request->division_id;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('districts.view')->with('success', 'Data save successfully');
    }

    public function edit($id){
        $data['editData'] =District::find($id);
        $data['divisions']=Division::all();
        return view('backend.district.add-district', $data);
    }

    public function update(DistrictRequest $request, $id){
        $this->validate($request, [
            'name' => 'required|unique:districts,name',
        ]);
        $data = District::find($id);
        $data->name = $request->name;
        $data->division_id = $request->division_id;
        $data->save();
        return redirect()->route('districts.view')->with('success', 'Division Update successfully');
    }

    public function delete(Request $request){
        $data = District::find($request->id);
        $data ->delete();
        return back()->withSuccess('Delete SuccessFully');
    }
}
