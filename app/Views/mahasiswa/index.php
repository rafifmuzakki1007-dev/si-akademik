<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Manajemen Mahasiswa (Acara 10 - Inheritance & Repository)</h3>
        <a href="/mahasiswa/create" class="btn btn-light btn-sm fw-bold">+ Tambah Mahasiswa</a>
    </div>
    <div class="card-body">
        <form action="/mahasiswa" method="GET" class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama atau NIM..." value="<?= htmlspecialchars($_GET['search'] ?? ''); ?>">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
            <?php if (!empty($_GET['search'])): ?>
                <a href="/mahasiswa" class="btn btn-outline-danger">Reset</a>
            <?php endif; ?>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" style="width: 5%;">No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Program Studi</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($mahasiswaList)): ?>
                        <?php $no = 1; foreach ($mahasiswaList as $mhs): ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= htmlspecialchars($mhs['nim']); ?></td>
                            <td><?= htmlspecialchars($mhs['nama']); ?></td>
                            <td><?= htmlspecialchars($mhs['email']); ?></td>
                            <td><?= htmlspecialchars($mhs['prodi_nama']); ?></td>
                            <td class="text-center"><span class="badge bg-secondary"><?= htmlspecialchars($mhs['angkatan']); ?></span></td>
                            <td class="text-center">
                                <a href="/mahasiswa/edit/<?= $mhs['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/mahasiswa/delete/<?= $mhs['id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">Tidak ada data mahasiswa ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>