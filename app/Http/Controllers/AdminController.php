<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use DB;

class AdminController extends Controller
{
    public function list()
    {
        $data['header_title'] = "Admin List";
        return view('admin.admin.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Admin";
        return view('admin.admin.add', $data);
    }
    public function insert(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'admin_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();

        if ($request->hasFile('admin_photo')) {
            $photo = $request->file('admin_photo');
            $photoPath = $photo->store('uploads', 'public');

            DB::table('users_photos')->insert([
                'user_id' => $user->id,
                'photo_path' => $photoPath
            ]);
        }

        return response()->json(['success' => __('messages.admin_created_successfully')]);
    }




}
