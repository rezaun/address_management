<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function view(){
        $data['allData'] = Division::all();
        return view('backend.division.view-division', $data);
    }
    public function add(){
        return view('backend.division.add-division');
    }

    public function store(Request $request){
        $this->validate($request, [
           'name' => 'required|unique:divisions,name',
        ]);
        $data = new Division();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('divisions.view');
    }

    public function edit($id){
        $editData =Division::find($id);
        return view('backend.division.add-division', compact('editData'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|unique:divisions,name',
        ]);
        $data = Division::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('divisions.view')->with('success', 'Division Update successfully');
    }

    public function delete(Request $request){
        $data = Division::find($request->id);
        $data ->delete();
        return back()->withSuccess('Delete SuccessFully');
    }
}
