<?php

namespace App\Http\Controllers;
use App\Models\pasien;
use Illuminate\Http\Request;

class Edit extends Controller
{
    public function edit($id)
{
    $pasien = pasien::findOrFail($id);
    return view('editpasien', compact('pasien'));

}
}
