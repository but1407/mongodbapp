<?php

namespace App\Http\Controllers\Users;


use App\Models\Loginmongodb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class LoginmongodbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.login',[
            'inputName' => 'input your name account',
            'inputPass' => 'input your password',
            'title' => 'login'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => ['required'],
            'password' => [
                'required'
                ,
                function ($attribute, $value, $fail) {
                    $this->isUppercase($value,$fail);
            }]
        ]);
        
        if (Auth::attempt(['email' => $request->input('email'),
                            'password' => $request->input('password'),
                            'confirm' => true,
                             //kiem tra co dung email va password
        ])){
            return redirect()->route('admin');
        }
        // $request->session()->flash('error','dang nhap deo thanh cong');
        // return redirect()->back();
        return redirect()->route('login');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loginmongodb  $loginmongodb
     * @return \Illuminate\Http\Response
     */
    public function show(Loginmongodb $loginmongodb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loginmongodb  $loginmongodb
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loginmongodb  $loginmongodb
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request )
    {
        $account = User::find($request->id);
        $account->fill($request);
        return $account->save();
        // $account -> save();
        // $account -> update($req  uest->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loginmongodb  $loginmongodb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loginmongodb $loginmongodb)
    {
        //
    }

    public function forgotPass()
    {
        return view('forgotPass',[
            'title' => "Forgot Password",
        ]);
    }
    public function postForgotPass(Request $request)
    {
        $request->validate([
            'email'=>'required|exists:users'
        ],[
            'email.exists'=>"This email is not exists on our database"
        ]);
        $token = strtoupper(Str::random(100));
        $customer = User::where('email',$request->email)->first();
        $customer->update(['token',$token]);
        
        Mail::send('mails.check_email_forgot', compact('customer'), function ($email) use ($customer) {
            $email->subject('My Account- Lay lai mat khau');
            $email->to($customer->email,$customer->name);
        });
        return redirect()->back()->with('err', 'ma xac nhan khong hop le');

    }
    public function getPass(User $customer, $token)
    {
        if($customer->token === $token){
            return view('getPass');

        } 
        return response()->json('error', '404');
    }
    public function postGetPass(User $customer, $token, Request $request  ){
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required',

        ]);
        $password_h = bcrypt($request->password);
        $customer->update(['password'=> $password_h, 'token'=> null]);
        return redirect()->route('login')->with('yes', 'dat lai mat khau thanh cong');
    }
    public function isUppercase($value,$fail){
        if($value !== mb_strtoupper($value,'UTF-8')){
            //have error
            $fail('loi :attribute khong hop le');
        }
    }

}