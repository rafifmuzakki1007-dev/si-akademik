<div class="card shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Tambah Data Mahasiswa</h4>
    </div>
    <div class="card-body">
        <form action="/mahasiswa" method="POST">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select name="prodi_id" class="form-control" required>
                    <option value="">-- Pilih Prodi --</option>
                    <?php foreach ($prodiList as $p): ?>
                        <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Angkatan</label>
                <input type="number" name="angkatan" class="form-control" value="2026" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/mahasiswa" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>