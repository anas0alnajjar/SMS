<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgotPassword;
use Mail;
use Str;

class AuthController extends Controller
{
    public function login ()
    {
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1){ 
                return redirect('admin\dashboard');
            }
            else if(Auth::user()->user_type == 2){ 
                return redirect('teacher\dashboard');
            }
            else if(Auth::user()->user_type == 3){ 
                return redirect('student\dashboard');
            }
            else if(Auth::user()->user_type == 4){ 
                return redirect('parent\dashboard');
            }
        }
        return view('auth.login');
    }

    public function logout ()
    {
        Auth::logout();
        return redirect(url('/'));
    }
  
    public function forgotPassword ()
    {
        return view('auth.forgot');
    }
  
    public function reset ($remember_token)
    {
        // dd($remember_token);
        $user = User::getToken($remember_token); 
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            abort(400);
        }
    }
    

    public function postReset($token, Request $request)
    {
        if ($request->password == $request->confirm_password) {
            $user = User::getToken($token); 
            if ($user) {
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(30);
                $user->save();
    
                return response()->json(['success' => Lang::get('messages.password_changed')]);
            } else {
                return response()->json(['error' => Lang::get('messages.invalid_token')], 400);
            }
        } else {
            return response()->json(['error' => Lang::get('messages.passwords_do_not_match')], 400);
        }
    }
    
    
  
    public function postForgotPassword(Request $request)
{
    $user = User::getEmailSingle($request->email);
    if (!empty($user)) {
        $user->remember_token = Str::random(30);
        $user->save();
        Mail::to($user->email)->send(new ForgotPassword($user));
    }

    // في كلا الحالتين، نعيد نفس الاستجابة
    return response()->json(['success' => Lang::get('messages.password_reset_email_sent')]);
}

   
    public function AuthLogin(Request $request)
{
    $rememberMe = !empty($request->remember) ? true : false;
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $rememberMe)) {
        $redirectUrl = '';

        if (Auth::user()->user_type == 1) { 
            $redirectUrl = 'admin/dashboard';
        } else if (Auth::user()->user_type == 2) { 
            $redirectUrl = 'teacher/dashboard';
        } else if (Auth::user()->user_type == 3) { 
            $redirectUrl = 'student/dashboard';
        } else if (Auth::user()->user_type == 4) { 
            $redirectUrl = 'parent/dashboard';
        }

        return response()->json(['redirect' => $redirectUrl]);
    } else {
        return response()->json(['error' => Lang::get('messages.invalid_credentials')], 401);
    }
}
}
