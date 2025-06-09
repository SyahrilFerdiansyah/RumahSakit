<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kunjungan - RS Selaras</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kunjungan.css') }}">
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
            <a href="{{ url('/dokter') }}">Dokter</a>
            <a href="{{ url('/tindakan') }}">Tindakan</a>
            <a href="{{ url('/kunjungan') }}" class="active">Kunjungan</a>
            <a href="{{ url('/detail_tindakan') }}">Detail Kunjungan</a>

        </nav>
    </div>

    <div class="main">
        <div class="main-header">Kunjungan</div>
        <div class="search-bar">
            <a href="{{ url('/tambah') }}" class="btn">+ Tambah Kunjungan</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pasien ID</th>
                        <th>Dokter ID</th>
                        <th>Tanggal</th>
                        <th>Keluhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kunjungans as $k)
                        <tr>
                            <td>{{ $k->id }}</td>
                            <td>{{ $k->pasien_id }}</td>
                            <td>{{ $k->dokter_id }}</td>
                            <td>{{ $k->tanggal }}</td>
                            <td>{{ $k->keluhan }}</td>
                            <td>
                                <button class="btn-edit"
                                    onclick="openModal('{{ $k->id }}', '{{ $k->pasien_id }}', '{{ $k->dokter_id }}', '{{ $k->tanggal }}', '{{ $k->keluhan }}')">
                                    Lihat
                                </button>
                                <form action="{{ url('/kunjungan/' . $k->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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

    <!-- Modal -->
    <div id="editModal">
        <div class="modal-content-detail">
            <!-- Detail -->
            <div id="detail-section">
                <h2 class="modal-title-detail">Detail Kunjungan</h2>
                <div class="modal-body-detail">
                    <div class="detail-row"><span class="detail-label">Pasien ID:</span><span class="detail-value" id="view-pasien"></span></div>
                    <div class="detail-row"><span class="detail-label">Dokter ID:</span><span class="detail-value" id="view-dokter"></span></div>
                    <div class="detail-row"><span class="detail-label">Tanggal:</span><span class="detail-value" id="view-tanggal"></span></div>
                    <div class="detail-row"><span class="detail-label">Keluhan:</span><span class="detail-value" id="view-keluhan"></span></div>
                </div>
                <div class="modal-footer-detail">
                    <button class="btn-detail" onclick="closeModal()">Tutup</button>
                    <button class="btn-detail" onclick="showEditForm()">Edit</button>
                </div>
            </div>

            <!-- Form Edit -->
            <form id="edit-form" method="POST">
                @csrf
                @method('PUT')
                <span class="modal-close" onclick="cancelEdit()">×</span>
                <h3>Edit Kunjungan</h3>
                <input type="hidden" name="id" id="edit-id">
                <label>Pasien ID</label>
                <input type="text" name="pasien_id" id="edit-pasien" required>
                <label>Dokter ID</label>
                <input type="text" name="dokter_id" id="edit-dokter" required>
                <label>Tanggal</label>
                <input type="date" name="tanggal" id="edit-tanggal" required>
                <label>Keluhan</label>
                <input type="text" name="keluhan" id="edit-keluhan" required>
                <div style="margin-top: 15px; text-align:right;">
                    <button type="submit" class="btn">Simpan</button>
                    <button type="button" class="btn" onclick="cancelEdit()">Batal</button>
                </div>
            </form>
        </div>
    </div>

      <script src="{{ asset('js/dokter.js') }}"></script>
</body>
</html>
