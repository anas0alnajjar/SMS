<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['header_title'] = 'Classes';
        return view('admin.class.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add Class';
        return view('admin.class.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $save = new ClassModel();
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();

        return response()->json(['success' => __('messages.class_created_successfully')]);
    }

    public function edit($id)
    {
        $class = ClassModel::find($id);
        return response()->json($class);
    }


    public function update(Request $request, $id)
    {

        $class = ClassModel::find($id);
        $class->name = trim($request->name);
        $class->status = trim($request->status);
        $class->save();

        return response()->json(['success' => __('messages.saveChanges')]);
    }

    public function delete(Request $request, $id)
    {
        $class = ClassModel::find($id);
        if ($class) {
            $class->is_deleted = 1;
            $class->save();
            return response()->json(['success' => __('messages.classDeleted')]);
        } else {
            return response()->json(['error' => __('messages.classNotFound')]);
        }
    }



}
