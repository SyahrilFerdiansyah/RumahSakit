<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter - RS Selaras</title>
    <link rel="stylesheet" href="{{ asset('css/dokter.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">
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
            <a href="{{ url('/pasien') }}">Pasien</a>
            <a href="{{ url('/dokter') }}" class="active">Dokter</a>
            <a href="{{ url('/tindakan') }}">Tindakan</a>
            <a href="{{ url('/kunjungan') }}">Kunjungan</a>
            <a href="{{ url('/detail_tindakan') }}">Detail Kunjungan</a>
        </nav>
    </div>

    <div class="main">
        <div class="main-header">Dokter</div>
        <div class="search-bar">
            <a href="{{ url('/tambah') }}" class="btn">+ Tambah Dokter</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Spesialis</th>
                        <th>Jadwal Praktek</th>
                        <th>No. STR</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokters as $dokter)
                        <tr>
                            <td>{{ str_pad($dokter->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td><strong>{{ $dokter->nama }}</strong></td>
                            <td>{{ $dokter->spesialis }}</td>
                            <td>{{ $dokter->jadwal_praktek }}</td>
                            <td>{{ $dokter->no_str }}</td>
                            <td>
                                <button class="btn-edit"
                                    onclick="openEditModal('{{ $dokter->nama }}', '{{ $dokter->spesialis }}', '{{ $dokter->jadwal_praktek }}', '{{ $dokter->no_str }}', '{{ $dokter->id }}')">
                                    Lihat
                                </button>
                                <form action="{{ url('/dokter/' . $dokter->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
            <!-- Detail Dokter -->
            <div id="detail-section">
                <h2 class="modal-title-detail">Detail Dokter</h2>
                <div class="modal-body-detail">
                    <div class="detail-row">
                        <span class="detail-label">Nama:</span>
                        <span class="detail-value" id="view-nama"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Spesialis:</span>
                        <span class="detail-value" id="view-spesialis"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Jadwal Praktek:</span>
                        <span class="detail-value" id="view-jadwal"></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">No. STR:</span>
                        <span class="detail-value" id="view-str"></span>
                    </div>
                </div>
                <div class="modal-footer-detail">
                    <button type="button" class="btn-detail" onclick="closeEditModal()">Tutup</button>
                    <button type="button" class="btn-detail" onclick="showEditForm()">Edit</button>
                </div>
            </div>

            <!-- Edit Form Dokter -->
            <form id="edit-form" method="POST" style="display: none;">
                @csrf
                @method('PUT')
                <span class="modal-close" onclick="cancelEdit()">×</span>
                <h3>Edit Dokter</h3>
                <input type="hidden" name="id" id="edit-id">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Spesialis</th>
                            <th>Jadwal Praktek</th>
                            <th>No. STR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="nama" id="edit-nama" required></td>
                            <td><input type="text" name="spesialis" id="edit-spesialis" required></td>
                            <td><input type="text" name="jadwal_praktek" id="edit-jadwal" required></td>
                            <td><input type="text" name="no_str" id="edit-str" required></td>
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

      <script src="{{ asset('js/dokter.js') }}"></script>
</body>
</html>
