<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tindakan - RS Selaras</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/detail_tindakan.css') }}">
</head>
<body>
    @if(session('success'))
        <script>alert("{{ session('success') }}");</script>
    @endif
    @if(session('error'))
        <script>alert("{{ session('error') }}");</script>
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
            <a href="{{ url('/kunjungan') }}">Kunjungan</a>
            <a href="{{ url('/detail_tindakan') }}">Detail Kunjungan</a>
        </nav>
    </div>

    <div class="main">
        <div class="main-header">Detail Tindakan</div>
        <div class="search-bar">
            <a href="{{ url('/tambah') }}" class="btn">+ Tambah Detail Tindakan</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kunjungan ID</th>
                        <th>Tindakan ID</th>
                        <th>Keterangan</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_tindakans as $item)
                        <tr>
                            <td>{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $item->kunjungan_id }}</td>
                            <td>{{ $item->tindakan_id }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>Rp{{ number_format($item->subtotal, 0, ',', '.') }}0</td>
                            <td>
                                <button class="btn-edit" onclick="openDetailModal(
                                    '{{ $item->id }}',
                                    '{{ $item->kunjungan_id }}',
                                    '{{ $item->tindakan_id }}',
                                    '{{ $item->keterangan }}',
                                    '{{ $item->subtotal }}'
                                )">Lihat</button>

                                <form action="{{ url('/detail_tindakan/' . $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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

<!-- Modal Gabungan Detail + Edit -->
<div id="detailModal">
    <div class="modal-content-detail">
        <!-- Tampilan Detail -->
        <div id="detail-section">
            <h2 class="modal-title-detail">Detail Tindakan</h2>
            <div class="modal-body-detail">
                <div class="detail-row">
                    <span class="detail-label">Kunjungan ID:</span>
                    <span class="detail-value" id="modal-kunjungan"></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Tindakan ID:</span>
                    <span class="detail-value" id="modal-tindakan"></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Keterangan:</span>
                    <span class="detail-value" id="modal-keterangan"></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Subtotal:</span>
                    <span class="detail-value" id="modal-subtotal"></span>
                </div>
            </div>
            <div class="modal-footer-detail">
                <button class="btn-detail" onclick="closeModal()">Tutup</button>
                <button class="btn-detail" onclick="showEditForm()">Edit</button>
            </div>
        </div>

        <!-- Form Edit -->
        <form id="editForm" method="POST" style="display: none;">
            @csrf
            @method('PUT')
            <span class="modal-close" onclick="cancelEdit()">×</span>
            <h3>Edit Detail Tindakan</h3>
            <input type="hidden" id="edit-id" name="id">
            <table>
                <thead>
                    <tr>
                        <th>Kunjungan ID</th>
                        <th>Tindakan ID</th>
                        <th>Keterangan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" id="edit-kunjungan" name="kunjungan_id" required></td>
                        <td><input type="text" id="edit-tindakan" name="tindakan_id" required></td>
                        <td><input type="text" id="edit-keterangan" name="keterangan" required></td>
                        <td><input type="number" id="edit-subtotal" name="subtotal" required></td>
                    </tr>
                </tbody>
            </table>
            <div style="text-align: right;">
                <button type="submit" class="btn-detail">Simpan</button>
                <button type="button" class="btn-detail" onclick="cancelEdit()">Batal</button>
            </div>
        </form>
    </div>
</div>
      <script src="{{ asset('js/detail_tindakan.js') }}"></script>
</body>
</html>
