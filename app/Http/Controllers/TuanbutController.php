<?php

namespace App\Http\Controllers;

use App\Models\Tuanbut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TuanbutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = Tuanbut::all();
        return view('admin.home',[
            'title' => 'mangement account Page',
            'account' => $account
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add',[
            'title' => 'Add new account',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            // User::create([ //tạo danh mục
            //     'name'=> (string)$request->input('name'),
            //     'password' => bcrypt($request->input('password'))
            // ]);

            $user = new Tuanbut();
            $user->name = (string)$request->name;
            $user->password = bcrypt($request->password);
            $user->save();
            Session::flash('success','create dashboard successfully');

        return redirect()->back();
    }
        // return response()->json(["result" => "ok"], 201);


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tuanbut  $tuanbut
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $accounts = Tuanbut::all();
        $account = $accounts->where('name',$request->name);
        return view('admin.update',[
            'title' => 'edit'. $account, //dat ten cho title
            'account'=> $account, //lay ra thanh phan trong id

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tuanbut  $tuanbut
     * @return \Illuminate\Http\Response
     */
    public function edit(Tuanbut $tuanbut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tuanbut  $tuanbut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuanbut $tuanbut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tuanbut  $tuanbut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tuanbut $tuanbut)
    {
        //
    }
}
