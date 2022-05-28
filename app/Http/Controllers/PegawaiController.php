<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai', [
            'pegawais' => Pegawai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai_create', [
            'users' => User::where('role_id', 2)->get()
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
            'user_id' => 'required',
            'alamat' => 'required|max:255',
            'no_telp' => 'required',
            'jabatan' => 'required|max:255'
        ]);

        Pegawai::create($validated_data);

        return redirect('/pegawai')->with('pegawai_success', 'Pegawai berhasil ditambahkan!');
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
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai_edit', [
            'pegawai' => $pegawai,
            'users' => User::where('role_id', 2)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validated_data = $request->validate([
            'user_id' => 'required',
            'alamat' => 'required|max:255',
            'no_telp' => 'required',
            'jabatan' => 'required|max:255'
        ]);

        Pegawai::where('id', $pegawai->id)
        ->update($validated_data);

        return redirect('/pegawai')->with('pegawai_success', 'Pegawai berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::destroy($pegawai->id);
        return redirect('/pegawai')->with('pegawai_success', 'Pegawai berhasil dihapus!');
    }
}
