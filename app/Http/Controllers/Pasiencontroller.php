<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function api()
    {
        return response()->json(pasien::all());
    }

    public function index()
    {
        $pasiens = pasien::all();
        return view('pasien', compact('pasiens'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required|string|max:255',
            'nik'       => 'required|integer|unique:pasiens,nik',
            'tgl_lahir' => 'required|date',
            'alamat'    => 'required|string|max:255',
            'no_hp'     => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        pasien::create($validator->validated());

        return redirect('/pasien')->with('success', 'Pasien berhasil ditambahkan!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $pasiens = pasien::query()
            ->where('nama', 'like', "%$search%")
            ->orWhere('nik', 'like', "%$search%")
            ->orWhere('alamat', 'like', "%$search%")
            ->orWhere('no_hp', 'like', "%$search%")
            ->get();

        return view('pasien', compact('pasiens'));
    }

public function edit($id)
{
    $pasien = Pasien::findOrFail($id);
    return view('editpasien', compact('pasien'));
}

public function update(Request $request, $id)
{
    $pasien = Pasien::findOrFail($id);
    $pasien->update($request->all());

    return redirect('/pasien')->with('success', 'Pasien berhasil diupdate');
}



    public function destroy($id)
    {
        $pasien = pasien::find($id);

        if (!$pasien) {
            return redirect('/pasien')->with('error', 'Pasien tidak ditemukan');
        }

        $pasien->delete();

        return redirect('/pasien')->with('success', 'Data pasien berhasil dihapus!');
    }
}
