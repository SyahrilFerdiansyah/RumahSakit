<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function api()
    {
        return response()->json(Kunjungan::all());
    }

    public function index()
    {
        $kunjungans = Kunjungan::all();
        return view('kunjungan', compact('kunjungans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal'   => 'required|date',
            'keluhan'   => 'required|string',
        ]);

        $kunjungan = Kunjungan::create($validated);

         return redirect('/kunjungan')->with('success', 'Kunjungan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kunjungan = Kunjungan::with(['dokter', 'pasien'])->find($id);

        if (!$kunjungan) {
            return response()->json(['message' => 'Kunjungan tidak ditemukan'], 404);
        }

        return response()->json($kunjungan);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal'   => 'required|date',
            'keluhan'   => 'required|string',
        ]);

        $kunjungan = Kunjungan::find($id);
        if (!$kunjungan) {
            return redirect()->back()->with('error', 'Kunjungan tidak ditemukan');
        }

        $kunjungan->update($validated);

        return redirect()->back()->with('success', 'Kunjungan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kunjungan = Kunjungan::find($id);

        if (!$kunjungan) {
            return response()->json(['message' => 'Kunjungan tidak ditemukan'], 404);
        }

        $kunjungan->delete();

        return response()->json(['message' => 'Kunjungan berhasil dihapus']);
    }
}
