<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parkir;

class ParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parkir = Parkir::all();

        return view('parkir.layout', compact('parkir'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parkir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl' => 'required',
            'nama' => 'required',
            'nis' => 'required',
            'nomor_kendaraan' => 'required'
        ]);
        Parkir::create($request->all());

        return redirect()->route('parkir.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parkir $parkir)
    {
        return view('parkir.show', compact('parkir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parkir $parkir)
    {
        return view('parkir.edit', compact('parkir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parkir $parkir)
    {
        $request->validate([
            'tgl' => 'required',
            'nama' => 'required',
            'nis' => 'required',
            'nomor_kendaraan' => 'required'
        ]);
        $parkir->update($request->all());

        return redirect()->route('parkir.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parkir $parkir)
    {
        $parkir->delete();

        return redirect()->route('parkir.index');
    }
}
