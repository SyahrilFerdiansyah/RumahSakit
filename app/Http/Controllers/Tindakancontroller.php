<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    public function api()
    {
        return response()->json(Tindakan::all());
    }

    public function index()
    {
        $tindakans = Tindakan::all();
        return view('tindakan', compact('tindakans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'harga'         => 'required|numeric|min:0',
            'kode_icd'      => 'required|string|max:20',
        ]);

        Tindakan::create($validated);

        return redirect('/tindakan')->with('success', 'Tindakan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $tindakan = Tindakan::find($id);

        if (!$tindakan) {
            return redirect('/tindakan')->with('error', 'Tindakan tidak ditemukan');
        }

        return view('detailtindakan', compact('tindakan')); // jika kamu punya halaman detail
    }

    public function update(Request $request, $id)
    {
        $tindakan = Tindakan::find($id);

        if (!$tindakan) {
            return redirect('/tindakan')->with('error', 'Tindakan tidak ditemukan');
        }

        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:255',
            'harga'         => 'required|numeric|min:0',
            'kode_icd'      => 'required|string|max:20',
        ]);

        $tindakan->update($validated);

        return redirect('/tindakan')->with('success', 'Tindakan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tindakan = Tindakan::find($id);

        if (!$tindakan) {
            return redirect('/tindakan')->with('error', 'Tindakan tidak ditemukan');
        }

        $tindakan->delete();

        return redirect('/tindakan')->with('success', 'Tindakan berhasil dihapus!');
    }
}
