        let currentEditId = null;

        function openEditModal(nama, spesialis, jadwal, str, id) {
            currentEditId = id;

            document.getElementById('view-nama').innerText = nama;
            document.getElementById('view-spesialis').innerText = spesialis;
            document.getElementById('view-jadwal').innerText = jadwal;
            document.getElementById('view-str').innerText = str;

            document.getElementById('detail-section').style.display = 'block';
            document.getElementById('edit-form').style.display = 'none';
            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function showEditForm() {
            document.getElementById('edit-nama').value = document.getElementById('view-nama').innerText;
            document.getElementById('edit-spesialis').value = document.getElementById('view-spesialis').innerText;
            document.getElementById('edit-jadwal').value = document.getElementById('view-jadwal').innerText;
            document.getElementById('edit-str').value = document.getElementById('view-str').innerText;

            document.getElementById('edit-form').action = '/dokter/' + currentEditId;

            document.getElementById('detail-section').style.display = 'none';
            document.getElementById('edit-form').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('edit-form').style.display = 'none';
            document.getElementById('detail-section').style.display = 'block';
        }