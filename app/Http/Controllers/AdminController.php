<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage; // تأكد من استخدام الفئة الصحيحة
use Hash;
use DB;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
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


    public function edit($id)
    {
        $admin = User::find($id);
        $photo = DB::table('users_photos')->where('user_id', $id)->first();
        $admin->photo_url = $photo ? $photo->photo_path : null;
        return response()->json($admin);
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,'.$id,
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'admin_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $admin = User::find($id);
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        if ($request->hasFile('admin_photo')) {
            $photo = $request->file('admin_photo');
            $photoPath = $photo->store('uploads', 'public');

            // حذف الصورة القديمة إذا كانت موجودة
            $oldPhoto = DB::table('users_photos')->where('user_id', $admin->id)->first();
            if ($oldPhoto) {
                Storage::disk('public')->delete($oldPhoto->photo_path);
            }

            DB::table('users_photos')->updateOrInsert(
                ['user_id' => $admin->id],
                ['photo_path' => $photoPath]
            );
        }

        return response()->json(['success' => __('messages.saveChanges')]);
    }

    public function destroy($id)
    {
        $admin = User::find($id);
        if (!$admin) {
            return response()->json(['error' => __('messages.admin_not_found')], 404);
        }

        // حذف الصورة إذا كانت موجودة
        $photo = DB::table('users_photos')->where('user_id', $id)->first();
        if ($photo) {
            Storage::disk('public')->delete($photo->photo_path);
            DB::table('users_photos')->where('user_id', $id)->delete();
        }

        $admin->delete();

        return response()->json(['success' => __('messages.admin_deleted_successfully')]);
    }

}
