<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien - RS Selaras</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pasien.css') }}">
</head>
<body>
        @if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('image/rsselaras-removebg-preview.png') }}" alt="Logo RS">
        </div>
        <nav>
            <a href="{{ url('/') }}">Dashboard</a>
            <a href="{{ url('/pasien') }}" class="active">Pasien</a>
            <a href="{{ url('/dokter') }}">Dokter</a>
            <a href="{{ url('/tindakan') }}">Tindakan</a>
            <a href="{{ url('/kunjungan') }}">Kunjungan</a>
            <a href="{{ url('/detail_tindakan') }}">Detail Tindakan</a>

        </nav>
    </div>

    <div class="main">
        <div class="main-header">Pasien</div>
        <div class="search-bar">
            <a href="{{ url('/tambah') }}" class="btn">+ Tambah Pasien</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $pasien)
                        <tr>
                            <td>{{ str_pad($pasien->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td><strong>{{ $pasien->nama }}</strong></td>
                            <td>{{ $pasien->nik }}</td>
                            <td>{{ $pasien->tgl_lahir }}</td>
                            <td>{{ $pasien->alamat }}</td>
                            <td>{{ $pasien->no_hp }}</td>
                            <td>
                                <button class="btn-edit"
                                    onclick="openEditModal('{{ $pasien->nama }}', '{{ $pasien->nik }}', '{{ $pasien->tgl_lahir }}', '{{ $pasien->alamat }}', '{{ $pasien->no_hp }}', '{{ $pasien->id }}')">
                                    Lihat
                                </button>
                                <form action="{{ url('/pasien/' . $pasien->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal View + Edit -->
    <div id="editModal">
        <div class="modal-content-detail">
            <!-- Detail Section -->
            <div id="detail-section">
                <h2 class="modal-title-detail">Detail Pasien</h2>
                <div class="modal-body-detail">
                    <div class="detail-row">
                        <span class="detail-label">Nama:</span>
                        <span class="detail-value" id="view-nama"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">NIK:</span>
                        <span class="detail-value" id="view-nik"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Tanggal Lahir:</span>
                        <span class="detail-value" id="view-tgl_lahir"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Alamat:</span>
                        <span class="detail-value" id="view-alamat"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">No HP:</span>
                        <span class="detail-value" id="view-no_hp"></span>
                    </div>
                </div>
                <div class="modal-footer-detail">
                    <button type="button" class="btn-detail" onclick="closeEditModal()">Tutup</button>
                    <button type="button" class="btn-detail" onclick="showEditForm()">Edit</button>
                </div>
            </div>

            <!-- Edit Form -->
            <form id="edit-form" method="POST" style="display: none;">
                @csrf
                @method('PUT')
                <span class="modal-close" onclick="cancelEdit()">×</span>
                <h3>Edit Pasien</h3>
                <input type="hidden" name="id" id="edit-id">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="nama" id="edit-nama" required></td>
                            <td><input type="text" name="nik" id="edit-nik" required></td>
                            <td><input type="date" name="tgl_lahir" id="edit-tgl_lahir" required></td>
                            <td><input type="text" name="alamat" id="edit-alamat" required></td>
                            <td><input type="text" name="no_hp" id="edit-no_hp" required></td>
                        </tr>
                    </tbody>
                </table>
                <div style="text-align: right;">
                    <button type="submit" class="btn">Simpan</button>
                    <button type="button" class="btn" onclick="cancelEdit()">Batal</button>
                </div>
            </form>
        </div>
    </div>

      <script src="{{ asset('js/pasien.js') }}"></script>
</body>
</html>
