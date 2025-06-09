        function openDetailModal(id, kunjungan, tindakan, keterangan, subtotal) {
            document.getElementById('modal-kunjungan').innerText = kunjungan;
            document.getElementById('modal-tindakan').innerText = tindakan;
            document.getElementById('modal-keterangan').innerText = keterangan;
            document.getElementById('modal-subtotal').innerText = 'Rp' + parseInt(subtotal).toLocaleString('id-ID');

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-kunjungan').value = kunjungan;
            document.getElementById('edit-tindakan').value = tindakan;
            document.getElementById('edit-keterangan').value = keterangan;
            document.getElementById('edit-subtotal').value = subtotal;
            document.getElementById('editForm').action = '/detail_tindakan/' + id;

            document.getElementById('detail-section').style.display = 'block';
            document.getElementById('editForm').style.display = 'none';
            document.getElementById('detailModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('detailModal').style.display = 'none';
        }

        function showEditForm() {
            document.getElementById('detail-section').style.display = 'none';
            document.getElementById('editForm').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('editForm').style.display = 'none';
            document.getElementById('detail-section').style.display = 'block';
        }