<?php

namespace App\Http\Controllers;

use App\Models\DtAbsensi;
use App\Models\DtKaryawan;
use Illuminate\Http\Request;

class DtAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('absensi.index', [
            'absensis' => DtAbsensi::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = DtKaryawan::all();
        return view('absensi.create', [
            'karyawan' => $karyawan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|unique:dt_absensis,NIP',
            'status' => 'required|in:0,1,2,3',
            'tanggal' => 'required|date',
        ]);
        

        DtAbsensi::create($request->all());
        return redirect()->route('absensi.index')
                ->withSuccess('Berhasil Tambah Data Absensi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DtAbsensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DtAbsensi $absensi)
    {
        $karyawan = DtKaryawan::all();
        return view('absensi.edit', [
            'absensi' => $absensi,
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DtAbsensi $absensi)
    {
        $request->validate([
            'NIP' => 'required|unique:dt_absensis,NIP,'.$absensi->id,
            'status' => 'required|in:0,1,2,3',
            'tanggal' => 'required|date'
        ]);
        
        $absensi->update($request->all());
        return redirect()->route('absensi.index')
                ->withSuccess('Berhasil Update Data Absensi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DtAbsensi $absensi)
    {
        $absensi->delete();
        return redirect()->back()
                ->withSuccess('Berhasil Hapus Data Absensi.');
    }
}
