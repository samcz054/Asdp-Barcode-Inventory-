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
        $this->validate(
            $request,
            [
                'name'          => 'required',
                'username'      => 'required|unique:users|min:5',
                'email'         => 'required|email|unique:users,email',
                'password'      => 'required|same:konfirmasi',
            ],
            [
                'name.required'         => "Nama lengkap harus diisi",
                'username.required'     => "Username harus diisi",
                'email.required'        => "E-mail harus diisi",
                'password.required'     => "Password harus diisi",
            ]
        );

        $dataUser = User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password)
        ]);

        $dataUser->save();
        return redirect('admin/user/');
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
            'username'              => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|same:konfirmasi',
        ]);

        $user = User::find($id);
        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->email        = $request->email;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->update();

        return redirect()->route('user.index')->with('sukses, User berhasil di update');
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
        $user->delete();
        
        return redirect('admin/user/')->with('sukses', 'User berhasil di hapus');
    }
}
