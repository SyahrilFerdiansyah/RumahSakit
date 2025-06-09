<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/tambah.css') }}">

</head>

<body>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <ul style="margin: 0; padding: 0; list-style: none;">
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="form-section">
        <h2>Tambah Pasien</h2>
        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>

            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" required>

            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" required>

            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" required>

            <label for="no_hp">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" required>

            <button type="submit">Simpan</button> 
            <a href="{{ url()->previous() }}" class="btn btn-back"> Kembali</a>
        </form>

        <form action="/dokter" method="POST" class="data-form">
            @csrf
            <h3>Tambah Dokter</h3>
            <input type="text" name="nama" placeholder="Nama Dokter" required />
            <input type="text" name="spesialis" placeholder="Spesialis" required />
            <input type="text" name="jadwal_praktek" placeholder="Jadwal Praktek" required />
            <input type="text" name="no_str" placeholder="Nomor STR" required />
            <button type="submit">Simpan Dokter</button>
            <a href="{{ url()->previous() }}" class="btn btn-back"> Kembali</a>
        </form>

        <form action="/tindakan" method="POST" class="data-form">
            @csrf
            <h3>Tambah Tindakan</h3>
            <input type="text" name="nama_tindakan" placeholder="Nama Tindakan" required />
            <input type="text" name="harga" placeholder="Harga" required />
            <input type="text" name="kode_icd" placeholder="Kode ICD" required />
            <button type="submit">Simpan Tindakan</button>
            <a href="{{ url()->previous() }}" class="btn btn-back"> Kembali</a>
        </form>

        <form action="/kunjungan" method="POST" class="data-form">
            @csrf
            <h3>Tambah Kunjungan</h3>

            <label for="pasien_id">ID Pasien</label>
            <input type="number" name="pasien_id" id="pasien_id" required />

            <label for="dokter_id">ID Dokter</label>
            <input type="number" name="dokter_id" id="dokter_id" required />

            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" required />

            <label for="keluhan">Keluhan</label>
            <textarea name="keluhan" id="keluhan" required></textarea>

            <button type="submit">Simpan Kunjungan</button>
            <a href="{{ url()->previous() }}" class="btn btn-back"> Kembali</a>
        </form>

        <form action="/detail_tindakan" method="POST" class="data-form">
            @csrf
            <h3>Tambah Detail Tindakan</h3>

            <label for="kunjungan_id">ID Kunjungan</label>
            <input type="number" name="kunjungan_id" id="kunjungan_id" required />

            <label for="tindakan_id">ID Tindakan</label>
            <input type="number" name="tindakan_id" id="tindakan_id" required />

            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" required></textarea>

            <label for="subtotal">Subtotal</label>
            <input type="number" name="subtotal" id="subtotal" required />

            <button type="submit">Simpan Detail Tindakan</button>
            <a href="{{ url()->previous() }}" class="btn btn-back"> Kembali</a>

        </form>
    </section>

    <footer>
        <p>2025 Rumah Sakit Selaras</p>
    </footer>

</body>

</html>
