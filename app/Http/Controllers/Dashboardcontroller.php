<?php

namespace App\Http\Controllers;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Kunjungan;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $jumlahPasien = Pasien::count();
    $jumlahDokter = Dokter::count();
    $jumlahKunjungan = Kunjungan::count();
    $jumlahTindakan = Tindakan::count();

    return view('index', compact(
    'jumlahPasien', 'jumlahDokter', 'jumlahKunjungan', 'jumlahTindakan'
));
}

}
