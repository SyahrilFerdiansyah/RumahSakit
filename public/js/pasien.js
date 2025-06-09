        let currentEditId = null;

        function openEditModal(nama, nik, tgl_lahir, alamat, no_hp, id) {
            currentEditId = id;

            document.getElementById('view-nama').innerText = nama;
            document.getElementById('view-nik').innerText = nik;
            document.getElementById('view-tgl_lahir').innerText = tgl_lahir;
            document.getElementById('view-alamat').innerText = alamat;
            document.getElementById('view-no_hp').innerText = no_hp;

            document.getElementById('detail-section').style.display = 'block';
            document.getElementById('edit-form').style.display = 'none';
            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function showEditForm() {
            document.getElementById('edit-nama').value = document.getElementById('view-nama').innerText;
            document.getElementById('edit-nik').value = document.getElementById('view-nik').innerText;
            document.getElementById('edit-tgl_lahir').value = document.getElementById('view-tgl_lahir').innerText;
            document.getElementById('edit-alamat').value = document.getElementById('view-alamat').innerText;
            document.getElementById('edit-no_hp').value = document.getElementById('view-no_hp').innerText;

            document.getElementById('edit-form').action = '/pasien/' + currentEditId;

            document.getElementById('detail-section').style.display = 'none';
            document.getElementById('edit-form').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('edit-form').style.display = 'none';
            document.getElementById('detail-section').style.display = 'block';
        }