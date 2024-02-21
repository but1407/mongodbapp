<?php

namespace App\Http\Controllers;

use App\Jobs\sendMail;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateFormAccount;
use App\Models\Tuanbut;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Jenssegers\Mongodb\Eloquent;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $account = Tuanbut::orderBy('created_at','desc')->get();
        return view('admin.home',[
            'title' => 'mangement account Page',
            'account' => $account
        ]);
    }
    public function create(){
        return view('admin.add',[
            'title' => 'Add new account',
        ]);
    }
    public function store(Request $request){
        try{
            $isExist = Tuanbut::select("*")->where("name", (string)$request->name)->exists();
            // User::create([ //tạo danh mục
            //     'name'=> (string)$request->input('name'),
            //     'password' => bcrypt($request->input('password'))
            // ]);
            $user = new Tuanbut();
            if($request->has('file_upload')){
                $file = $request->file_upload;
                $ext = $request->file_upload->extension();
                $file_name = time().'-'.'product'.'.'.$ext;
                // dd($ext);
                // $file->move(storage_path('app/images'),$file_name);
                $file->move(public_path('storage'),$file_name);
                // $request->merge(['image'=>$file_name]);
                $user->image = $file_name;
            }
            if(!$isExist){
                $user->name = (string)$request->name;
                $user->password = bcrypt($request->password);
                $user->email = $request->email;
                $user->status = 1;
                $user->save();
                Session::flash('success','create dashboard successfully');//tạo message khi tạo dashboard thành công bằng session flash


                #Queue
                // sendMail::dispatch($request->email)->delay(now()->addSeconds(2));
                $users = Tuanbut::all();
                $message = [
                    'type' => 'Create task',
                    'task' => $user->name,
                    'content' => 'has been created!',
                ];
                sendMail::dispatch($message, $users)->delay(now()->addMinute(1));
                return redirect()->back();

            }else{
                Session::flash('success','Failed');//tạo message khi tạo dashboard thành công bằng session flash

            }
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        // $result = self::create($request);
        return redirect()->route('list');
    }
    public function show($id, Request $request)
    {

        // dd($menu);
        // $account = Tuanbut::find($name);
        $tuanbut = Tuanbut::find($id);
        return view('admin.update',[
            'title' => 'edit'. $tuanbut, //dat ten cho title
            'tuanbut'=> $tuanbut, //lay ra thanh phan trong id
        ]);
    }
    public function update(Request $request )
    {
        // dd($request);
        $rules = [
            'name' => 'required',
            'password'=>'required|integer'
        ];
        $messages = [
            'name.required' =>'phai nhap',
            'password.required' => 'phai nhap',
            'password.integer' => 'phai nhap so nguyen',

        ];
        $attributes = [
            'name' =>'ten nguoi',
            'password'=>'mat khau'
        ];
        $validator =validator($request->all(),$rules,$messages);
        // $validator->validate();
        if($validator->fails()){
            // return 'validate Failed';
            $validator->errors()->add('
            msg', 'vui long kiem tra lai du lieu');
        }
        // if($request->input('name') != $account->name){
            // $account->fill($request->input());
            // $account->save();
        // $account = new Tuanbut();
        // $account->name = $request->input("name");
        // $account->password = $request->password;
        // $account->save();
        // Session::flash('messsage','update successfully');
        // return Redirect()->route('list');
        // }

        $account = Tuanbut::find($request->id);
        $account->name = $request->name;
        $account->password = bcrypt($request->password);
        $account -> save();
        // $account -> update($req  uest->all());

        return Redirect()->route('list');

    }
    public function destroy($id){
        // dd($request);
        // $name =  $request->input('name');
        // $menu = Tuanbut::where('name', $name);
        // if($menu){
        //     return Tuanbut::where('name',$name)->delete();
        // }
        $item = Tuanbut::find($id);
        $item->status = 0;
        $item->save();
        // dd($item);
        $item->delete();
        return redirect()->back()->with('success','SUCCESSFULLY');
    }
    }