<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($id){
        $title = 'xac nhan otp';
        $user = User::where('_id',$id)->first();
        return view('email.register_with_code',[
            'title'=>$title,
            'id'=>$id,
            'user'=>$user->email,
        ]);
    }
    public function verify_OTP(Request $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        
        if (!$user) {
            return response()->json(["status" => 400, "message" => "User doenst exist"], 400);
        }
        if (Carbon::now()->gt($user->confirmation_code_expired_in)) {
            return response()->json(["status" => 400, "message" => "Your OTP expired"], 400);
        } else {
            if ($request->input('OTP_token') != $user->confirmation_code) {
                return response()->json(["status" => 400, "message" => "Your OTP is invalid"], 400);
            }
            
            $user->confirm = true;
            $user->save();
            response()->json(["status" => 200, "message" => "Succesfully verified"], 200);
            return redirect()->route('login');
        }
    }
    public function logout_OTP(Request $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        if (!$user) {
            return response()->json(["status" => 400, "message" => "User doenst exist"], 400);
        }
        if ($user->confirm == false) {
            $result = $user->delete();
            if ($result)
                return response()->json(["status" => 200, "message" => "Succesfully logout in OTP screen"], 200);
            else {
                return response()->json(["status" => 400, "message" => "Logout failed in OTP screen"], 400);
            }
        }
        return response()->json(["status" => 400, "message" => "Unauthorized"], 400);
    }
}