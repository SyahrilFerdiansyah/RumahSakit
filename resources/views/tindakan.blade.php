<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tindakan - RS Selaras</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tindakan.css') }}">
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
            <a href="{{ url('/tindakan') }}" class="active">Tindakan</a>
            <a href="{{ url('/kunjungan') }}">Kunjungan</a>
            <a href="{{ url('/detail_tindakan') }}">Detail Tindakan</a>

        </nav>
    </div>

    <div class="main">
        <div class="main-header">Tindakan</div>
        <div class="search-bar">
            <a href="{{ url('/tambah') }}" class="btn">+ Tambah Tindakan</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Tindakan</th>
                        <th>Subtotal</th>
                        <th>Kode ICD</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tindakans as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->nama_tindakan }}</td>
                        <td>Rp{{ number_format($t->harga, 0, ',', '.') }}</td>

                        <td>{{ $t->kode_icd }}</td>
                        <td>
                            <button class="btn-edit" onclick="openModal('{{ $t->id }}', '{{ $t->nama_tindakan }}', '{{ $t->harga }}', '{{ $t->kode_icd }}')">Lihat</button>
                            <form action="{{ url('/tindakan/' . $t->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
            <div id="detail-section">
                <h2 class="modal-title-detail">Detail Tindakan</h2>
                <div class="modal-body-detail">
                    <div class="detail-row"><span class="detail-label">Nama Tindakan:</span><span class="detail-value" id="view-nama"></span></div>
                    <div class="detail-row"><span class="detail-label">Harga:</span><span class="detail-value" id="view-harga"></span></div>
                    <div class="detail-row"><span class="detail-label">Kode ICD:</span><span class="detail-value" id="view-kode-icd"></span></div>
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
                <h3>Edit Tindakan</h3>
                <input type="hidden" name="id" id="edit-id">

                <label>Nama Tindakan</label>
                <input type="text" name="nama_tindakan" id="edit-nama" required>

                <label>Subtotal</label>
                <input type="text" name="harga" id="edit-harga" required>

                <label>Kode ICD</label>
                <input type="text" name="kode_icd" id="edit-kode-icd" required>

                <div style="margin-top: 15px; text-align:right;">
                    <button type="submit" class="btn">Simpan</button>
                    <button type="button" class="btn" onclick="cancelEdit()">Batal</button>
                </div>
            </form>
        </div>
    </div>

      <script src="{{ asset('js/tindakan.js') }}"></script>
</body>
</html>
