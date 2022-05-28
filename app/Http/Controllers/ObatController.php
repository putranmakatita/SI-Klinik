<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('obat', [
            'obats' => Obat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat_create');
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
            'nama_obat' => 'required|max:255',
            'jenis' => 'required|max:255',
            'usia' => 'required|max:255',
            'tanggal_kadaluarsa' => 'required|date'
        ]);

        Obat::create($validated_data);

        return redirect('/obat')->with('obat_success', 'Obat berhasil ditambahkan!');
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
    public function edit(Obat $obat)
    {
        return view('obat_edit', [
            'obat' => $obat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $validated_data = $request->validate([
            'nama_obat' => 'required|max:255',
            'jenis' => 'required|max:255',
            'usia' => 'required|max:255',
            'tanggal_kadaluarsa' => 'required|date'
        ]);

        Obat::where('id', $obat->id)
        ->update($validated_data);

        return redirect('/obat')->with('obat_success', 'Obat berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
       Obat::destroy($obat->id);

       return redirect('/obat')->with('obat_success', 'Obat berhasil dihapus!');
    }
}
