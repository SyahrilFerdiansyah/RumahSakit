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
            <input type="text" name="nama" id="nama" required placeholder="Nama Pasien">
            <input type="text" name="nik" id="nik" required placeholder="NIK">
            <input type="date" name="tgl_lahir" id="tgl_lahir" required placeholder="Tanggal Lahir">
            <input type="text" name="alamat" id="alamat" required placeholder="Alamat">
            <input type="text" name="no_hp" id="no_hp" required placeholder="Nomor HP">

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
            <input type="number" name="pasien_id" id="pasien_id" required placeholder="Id Pasien" />
            <input type="number" name="dokter_id" id="dokter_id" required  placeholder="Id Dokter"/>
            <input type="date" name="tanggal" id="tanggal" required placeholder="Tanggal"/>
            <textarea name="keluhan" id="keluhan" required placeholder="Keluhan"></textarea>

            <button type="submit">Simpan Kunjungan</button>
            <a href="{{ url()->previous() }}" class="btn btn-back"> Kembali</a>
        </form>

        <form action="/detail_tindakan" method="POST" class="data-form">
            @csrf
            <h3>Tambah Detail Tindakan</h3>

            <input type="number" name="kunjungan_id" id="kunjungan_id" required placeholder="Id Kunjungan" />
            <input type="number" name="tindakan_id" id="tindakan_id" required placeholder="Id Tindakan"/>
            <textarea name="keterangan" id="keterangan" required placeholder="Keterangan"></textarea>
            <input type="number" name="subtotal" id="subtotal" required placeholder="Subtotal" />
            <button type="submit">Simpan Detail Tindakan</button>
            <a href="{{ url()->previous() }}" class="btn btn-back"> Kembali</a>

        </form>
    </section>

    <footer>
        <p>2025 Rumah Sakit Selaras</p>
    </footer>

</body>

</html>
