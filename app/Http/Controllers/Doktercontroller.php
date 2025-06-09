<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    public function api()
    {
        return response()->json(Dokter::all());
    }

    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter', compact('dokters'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'           => 'required|string|max:255',
            'spesialis'      => 'required|string|max:255',
            'jadwal_praktek' => 'required|string|max:255',
            'no_str'         => 'required|string|unique:dokters,no_str|max:50'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        Dokter::create($validator->validated());

        return redirect('/dokter')->with('success', 'Dokter berhasil ditambahkan!');
    }

    public function show($id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json(['message' => 'Dokter tidak ditemukan'], 404);
        }

        return response()->json($dokter);
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return redirect('/dokter')->with('error', 'Dokter tidak ditemukan');
        }

        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'spesialis'      => 'required|string|max:255',
            'jadwal_praktek' => 'required|string|max:255',
            'no_str'         => 'required|string|max:50|unique:dokters,no_str,' . $id,
        ]);

        $dokter->update($validated);

        return redirect('/dokter')->with('success', 'Data dokter berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return redirect('/dokter')->with('error', 'Dokter tidak ditemukan');
        }

        $dokter->delete();

        return redirect('/dokter')->with('success', 'Data dokter berhasil dihapus!');
    }
}
