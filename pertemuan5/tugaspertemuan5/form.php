
<form action="simpan.php" method="post">
    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim"
           required minlength="5" maxlength="15"
           pattern="[0-9]+"
           title="NIM hanya boleh berisi angka">
    <br><br>

    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama"
           required minlength="3" maxlength="100">
    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="prodi">Prodi:</label>
    <select id="prodi" name="prodi" required>
        <option value="">-- Pilih Program Studi --</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Manajemen">Manajemen</option>
    </select>
    <br><br>

    <label for="angkatan">Angkatan:</label>
    <input type="number" id="angkatan" name="angkatan"
           min="2000" max="2100" required>
    <br><br>

    <label for="ipk">IPK:</label>
    <input type="number" id="ipk" name="ipk"
           min="0" max="4" step="0.01" required>
    <br><br>

    <button type="submit">Simpan Data</button>
</form>