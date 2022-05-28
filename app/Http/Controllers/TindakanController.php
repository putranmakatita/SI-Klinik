<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tindakan;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tindakan',[
            'tindakans' => Tindakan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tindakan_create');
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
           'tindakan' => 'required|max:255'
       ]);

       Tindakan::create($validated_data);

       return redirect('/tindakan')->with('tindakan_success', 'Tindakan berhasil ditambahkan!');
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
    public function edit(Tindakan $tindakan)
    {
        return view('tindakan_edit', [
            'tindakan' => $tindakan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tindakan $tindakan)
    {
        $validated_data = $request->validate([
            'tindakan' => 'required|max:255'
        ]);

        Tindakan::where('id', $tindakan->id)
        ->update($validated_data);

        return redirect('/tindakan')->with('tindakan_success', 'Tindakan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tindakan $tindakan)
    {
        Tindakan::destroy($tindakan->id);

        return redirect('/tindakan')->with('tindakan_success', 'Tindakan berhasil dihapus!');
    }
}
