<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_create', [
            'roles' => Role::all()
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
        $validated_data = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'role_id' => 'required',
            'password' => 'required|min:8'
        ]);

        $validated_data['password'] = Hash::make($validated_data['password']);
        User::create($validated_data);

        return redirect('/user')->with('user_success', 'User berhasil ditambahkan!');
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
    public function edit(User $user)
    {
        return view('user_edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'role_id' => 'required',
            'password' => 'required|min:8'
        ];

        if ($request->username == $user->username){
            $rules['username'] = "required";
        }
        else {
            $rules['username'] = 'required|unique:users';
        }

        $validated_data = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validated_data);

        return redirect('/user')->with('user_success', 'User berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with('user_success', 'User berhasil dihapus!');
    }
}
