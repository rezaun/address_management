<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnionRequest;
use App\Model\Division;
use App\Model\Union;
use App\Model\Upazila;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    public function view(){
        $data['allData'] = Union::orderBy('division_id','asc')->orderBy('district_id','asc')->orderBy('upazila_id','asc')->get();
        return view('backend.union.view-union', $data);
    }
    public function add(){
        $data['divisions']=Division::all();
        return view('backend.union.add-union', $data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:unions,name',
        ]);
        $data = new Union();
        $data->division_id = $request->division_id;
        $data->district_id= $request->district_id;
        $data->upazila_id= $request->upazila_id;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('unions.view')->with('success', 'Union save successfully');
    }

    public function edit($id){
        $data['editData'] =Union::find($id);
        $data['divisions']=Division::all();
        return view('backend.union.add-union', $data);
    }

    public function update(UnionRequest $request, $id){
        $this->validate($request, [
            'name' => 'required|unique:unions,name',
        ]);
        $data = Union::find($id);
        $data->name = $request->name;
        $data->division_id = $request->division_id;
        $data->district_id= $request->district_id;
        $data->upazila_id= $request->upazila_id;
        $data->save();
        return redirect()->route('unions.view')->with('success', 'Union Name Update successfully');
    }

    public function delete(Request $request){
        $data = Union::find($request->id);
        $data ->delete();
        return back()->withSuccess('Delete SuccessFully');
    }
}
