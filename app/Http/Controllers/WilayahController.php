<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wilayah', [
            'wilayahs' => Wilayah::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wilayah_create');
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
            "kota_kab" => 'required|unique:wilayahs',
            "provinsi" => 'required',
        ]);

        Wilayah::create($validated_data);

        return redirect('/wilayah')->with('wilayah_success', 'Wilayah berhasil ditambahkan!');
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
    public function edit(Wilayah $wilayah)
    {
        return view('wilayah_edit', [
            'wilayah' => $wilayah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        $validated_data = $request->validate([
            "kota_kab" => 'required|max:255',
            "provinsi" => 'required'
        ]);

        Wilayah::where('id', $wilayah->id)
            ->update($validated_data);

        return redirect('/wilayah')->with('wilayah_success', 'Wilayah berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wilayah $wilayah)
    {
        Wilayah::destroy($wilayah->id);
        return redirect('/wilayah')->with('wilayah_success', 'Wilayah berhasil dihapus!');
    }
}
