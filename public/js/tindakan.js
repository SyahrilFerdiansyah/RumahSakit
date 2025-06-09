        let currentId = null;

        function openModal(id, nama, harga, kode_icd) {
            currentId = id;
            document.getElementById('view-nama').innerText = nama;
            document.getElementById('view-harga').innerText = harga;
            document.getElementById('view-kode-icd').innerText = kode_icd;

            document.getElementById('editModal').style.display = 'flex';
            document.getElementById('detail-section').style.display = 'block';
            document.getElementById('edit-form').style.display = 'none';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function showEditForm() {
            document.getElementById('edit-nama').value = document.getElementById('view-nama').innerText;
            document.getElementById('edit-harga').value = document.getElementById('view-harga').innerText;
            document.getElementById('edit-kode-icd').value = document.getElementById('view-kode-icd').innerText;

            document.getElementById('edit-form').action = '/tindakan/' + currentId;
            document.getElementById('detail-section').style.display = 'none';
            document.getElementById('edit-form').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('edit-form').style.display = 'none';
            document.getElementById('detail-section').style.display = 'block';
        }