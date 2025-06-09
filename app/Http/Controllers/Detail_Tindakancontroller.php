<?php

namespace App\Http\Controllers;

use App\Models\Detail_Tindakan;
use App\Models\Kunjungan;
use App\Models\Tindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Detail_TindakanController extends Controller
{
    public function api()
    {
        return response()->json(Detail_Tindakan::all());
    }

    public function index()
    {
        $detail_tindakans = Detail_Tindakan::all();
        return view('detail_tindakan', compact('detail_tindakans'));
    }

    public function create()
    {
        $kunjungans = Kunjungan::all();
        $tindakans = Tindakan::all();
        return view('tambah_detail_tindakan', compact('kunjungans', 'tindakans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'tindakan_id'  => 'required|exists:tindakans,id',
            'keterangan'   => 'required|string',
            'subtotal'     => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Detail_Tindakan::create($validator->validated());

        return redirect('/detail_tindakan')->with('success', 'Detail tindakan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $detailTindakan = Detail_Tindakan::with(['kunjungan', 'tindakan'])->find($id);

        if (!$detailTindakan) {
            return redirect('/detail_tindakan')->with('error', 'Detail tindakan tidak ditemukan');
        }

        return view('detail_tindakan_detail', compact('detailTindakan'));
    }

    public function update(Request $request, $id)
    {
        $detailTindakan = Detail_Tindakan::find($id);

        if (!$detailTindakan) {
            return redirect('/detail_tindakan')->with('error', 'Detail tindakan tidak ditemukan');
        }

        $validator = Validator::make($request->all(), [
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'tindakan_id'  => 'required|exists:tindakans,id',
            'keterangan'   => 'required|string',
            'subtotal'     => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $detailTindakan->update($validator->validated());

        return redirect('/detail_tindakan')->with('success', 'Detail tindakan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $detailTindakan = Detail_Tindakan::find($id);

        if (!$detailTindakan) {
            return redirect('/detail_tindakan')->with('error', 'Detail tindakan tidak ditemukan');
        }

        $detailTindakan->delete();

        return redirect('/detail_tindakan')->with('success', 'Detail tindakan berhasil dihapus!');
    }
}
