<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Division;
use App\Model\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function view(){
        $data['allData'] = Village::orderBy('division_id','asc')->orderBy('district_id','asc')->orderBy('upazila_id','asc')->orderBy('union_id','asc')->orderBy('ward_id','asc')->get();
        return view('backend.village.view-village', $data);
    }
    public function add(){
        $data['divisions']=Division::all();
        return view('backend.village.add-village', $data);
    }

    public function store(Request $request){
        $data               = new Village();
        $data->division_id  = $request->division_id;
        $data->district_id  = $request->district_id;
        $data->upazila_id   = $request->upazila_id;
        $data->union_id     = $request->union_id;
        $data->ward_id      = $request->ward_id;
        $data->name         = $request->name;
        $data->save();
        return redirect()->route('villages.view')->with('success', 'Village save successfully');
    }

    public function edit($id){
        $data['editData'] =Village::find($id);
        $data['divisions']=Division::all();
        return view('backend.village.add-village', $data);
    }

    public function update(Request $request, $id){
        $data = Village::find($id);
        $data->name = $request->name;
        $data->division_id = $request->division_id;
        $data->district_id= $request->district_id;
        $data->upazila_id= $request->upazila_id;
        $data->union_id= $request->union_id;
        $data->ward_id= $request->ward_id;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('villages.view')->with('success', 'Village Name Update successfully');
    }

    public function delete(Request $request){
        $data = Village::find($request->id);
        $data ->delete();
        return back()->withSuccess('Delete SuccessFully');
    }
}
