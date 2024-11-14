<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Data Dokter
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="data-section">
    <?php if (!empty($doctors)): ?>
        <a href="/doctors/create" class="btn btn-primary" style="margin-bottom: 20px;">Tambah Dokter Baru</a>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Spesialisasi</th>
                    <th>No Lisensi</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $doctor): ?>
                    <tr>
                        <td><?= $doctor['id']; ?></td>
                        <td><?= $doctor['name']; ?></td>
                        <td><?= $doctor['specialization']; ?></td>
                        <td><?= $doctor['license_number']; ?></td>
                        <td><?= $doctor['phone_number']; ?></td>
                        <td class="action-buttons">
                            <a href="/doctors/edit/<?= $doctor['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="/doctors/delete/<?= $doctor['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data dokter yang tersedia.</p>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
