<?php

namespace App\Http\Controllers;

use App\Models\DtKaryawan;
use Illuminate\Http\Request;

class DtKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('karyawan.index', [
            'karyawans' => DtKaryawan::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|unique:dt_karyawans,NIP',
            'nama' => 'required',
            'jabatan' => 'required'
        ]);

        DtKaryawan::create($request->all());
        return redirect()->route('karyawan.index')
                ->withSuccess('Berhasil Tambah Data Karywan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DtKaryawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DtKaryawan $karyawan)
    {
        return view('karyawan.edit', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DtKaryawan $karyawan)
    {
        $request->validate([
            'NIP' => 'required|unique:dt_karyawans,NIP,'.$karyawan->id,
            'nama' => 'required',
            'jabatan' => 'required'
        ]);

        $karyawan->update($request->all());
        return redirect()->route('karyawan.index')
                ->withSuccess('Berhasil Update Data Karyawan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DtKaryawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->back()
                ->withSuccess('Berhasil Hapus Data Karyawan.');
    }
}
