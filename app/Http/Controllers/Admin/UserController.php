<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $user=User::all();
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'          =>'required',
            'email'         =>'required|email|unique:users,email',
            'password'      =>'required|same:konfirmasi_password',
        ]);

        $user=New User();

        $user->name =$request->name;
        $user->email =$request->txtemail_user;
        $user->password = Hash::make($request->password_user);
        $user->save();

        return redirect()->route('users.index')->with('sukses', 'User behasil Dibuat');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name'                  => 'required',
            'email'                 => 'required|email',
        ]);

        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->txtemail_user;
        if($request->password_user !=null){
            $user->password=Hash::make($request->password_user);
        }
        $user->update();

        return redirect()->route('users.index')->with('sukses, User berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user ->delete();
        
        return redirect()->route('users.index')->with('sukses', 'User berhasil di hapus');
    }
}
