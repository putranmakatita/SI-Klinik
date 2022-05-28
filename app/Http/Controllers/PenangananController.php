<?php

namespace App\Http\Controllers;

use App\Models\Penanganan;
use App\Models\Tindakan;
use App\Models\Pasien;
use App\Models\Obat;
use Illuminate\Http\Request;

class PenangananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penanganan',[
            'penanganans' => Penanganan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penanganan_create', [
            'tindakans' => Tindakan::all(),
            'pasiens' => Pasien::all(),
            'obats' => Obat::all()
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
            'pasien_id' => 'required',
            'tindakan_id' => 'required',
            'obat_id' => 'required',
            'keterangan' => 'max:255'
       ]);

       Penanganan::create($validated_data);

       return redirect('penanganan')->with('penanganan_success', 'Penanganan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penanganan  $penanganan
     * @return \Illuminate\Http\Response
     */
    public function show(Penanganan $penanganan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penanganan  $penanganan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penanganan $penanganan)
    {
        return view('penanganan_edit', [
            'penanganan' => $penanganan,
            'tindakans' => Tindakan::all(),
            'pasiens' => Pasien::all(),
            'obats' => Obat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penanganan  $penanganan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penanganan $penanganan)
    {
        $validated_data = $request->validate([
            'pasien_id' => 'required',
            'tindakan_id' => 'required',
            'obat_id' => 'required',
            'keterangan' => 'max:255'
       ]);

       Penanganan::where('id', $penanganan->id)
       ->update($validated_data);

       return redirect('penanganan')->with('penanganan_success', 'Penanganan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penanganan $penanganan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penanganan $penanganan)
    {
        Penanganan::destroy($penanganan->id);

        return redirect('/penanganan')->with('penanganan_success', 'Penanganan berhasil dihapus!');
    }
}
