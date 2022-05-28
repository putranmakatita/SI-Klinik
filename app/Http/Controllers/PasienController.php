<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pasien', [
            'pasiens' => Pasien::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien_create',[
            'users' => User::where('role_id', 3)->get()
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
            'jenis_kelamin' => 'required|max:255',
            'usia' => 'required|numeric',
            'no_rekmed' => 'required|numeric'
        ]);

        Pasien::create($validated_data);

        return redirect('/pasien')->with('pasien_success', 'Pasien berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasienController  $pasienController
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasienController  $pasienController
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('pasien_edit',[
            'pasien' => $pasien,
            'users' => User::where('role_id', 3)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasienController  $pasienController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validated_data = $request->validate([
            'user_id' => 'required',
            'jenis_kelamin' => 'required|max:255',
            'usia' => 'required|numeric',
            'no_rekmed' => 'required|numeric'
        ]);

        Pasien::where('id', $pasien->id)
        ->update($validated_data);

        return redirect('/pasien')->with('pasien_success', 'Pasien berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasienController  $pasienController
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);

        return redirect('/pasien')->with('pasien_success', 'Pasien berhasil dihapus!');
    }
}
