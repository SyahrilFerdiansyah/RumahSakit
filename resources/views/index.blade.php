<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RS Selaras</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="sidebar">
    <div class="logo">
            <a href="#" class="logo"><img src="{{ asset('image/rsselaras-removebg-preview.png') }}" width="300" height="300" /></a>
    </div>
    <nav>
      <a href="{{ url('/') }}">Dashboard</a>
      <a href="{{ url('/pasien') }}">Pasien</a>
      <a href="{{ url('/dokter') }}">Dokter</a>
      <a href="{{ url('/tindakan') }}">Tindakan</a>
      <a href="{{ url('/kunjungan') }}">Kunjungan</a>
      <a href="{{ url('/detail_tindakan') }}">Detail Kunjungan</a>

    </nav>
  </div>

  <div class="main">
    <div class="header">Dashboard</div>
        <div class="search-bar">
            <a href="{{ url('/detail_tindakan') }}" class="btn">Lihat Detail Tindakan</a>
        </div>

    <div class="content">
  <div class="card">
    <h3>Jumlah Pasien</h3>
    <div class="number">{{ $jumlahPasien }}</div>

  </div>
  <div class="card">
    <h3>Jumlah Dokter</h3>
    <div class="number">{{ $jumlahDokter }}</div>

  </div>
  <div class="card">
    <h3>Jumlah Kunjungan</h3>
    <div class="number">{{ $jumlahKunjungan }}</div>

  </div>   
  <div class="card">
    <h3>Tindakan</h3>
    <div class="number">{{ $jumlahTindakan }}</div>

  </div>
</div>
  




  </div>
</body>
</html>
