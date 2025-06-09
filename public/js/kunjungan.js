        let currentId = null;

        function openModal(id, pasienId, dokterId, tanggal, keluhan) {
            currentId = id;
            document.getElementById('view-pasien').innerText = pasienId;
            document.getElementById('view-dokter').innerText = dokterId;
            document.getElementById('view-tanggal').innerText = tanggal;
            document.getElementById('view-keluhan').innerText = keluhan;
            document.getElementById('editModal').style.display = 'flex';
            document.getElementById('detail-section').style.display = 'block';
            document.getElementById('edit-form').style.display = 'none';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function showEditForm() {
            document.getElementById('edit-pasien').value = document.getElementById('view-pasien').innerText;
            document.getElementById('edit-dokter').value = document.getElementById('view-dokter').innerText;
            document.getElementById('edit-tanggal').value = document.getElementById('view-tanggal').innerText;
            document.getElementById('edit-keluhan').value = document.getElementById('view-keluhan').innerText;

            document.getElementById('edit-form').action = '/kunjungan/' + currentId;
            document.getElementById('detail-section').style.display = 'none';
            document.getElementById('edit-form').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('edit-form').style.display = 'none';
            document.getElementById('detail-section').style.display = 'block';
        }