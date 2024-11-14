<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Data Pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="data-section">
    <?php if (!empty($patients)): ?>
        <a href="/patients/create" class="btn btn-primary" style="margin-bottom: 20px;">Tambah Pasien Baru</a>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No RM</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Alamat</th>
                    <th>TTL</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient): ?>
                    <tr>
                        <td><?= $patient['id']; ?></td>
                        <td><?= $patient['name']; ?></td>
                        <td><?= $patient['gender']; ?></td>
                        <td><?= $patient['address']; ?></td>
                        <td><?= $patient['birth_date']; ?></td>
                        <td><?= $patient['phone_number']; ?></td>
                        <td class="action-buttons">
                            <a href="/patients/edit/<?= $patient['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="/patients/delete/<?= $patient['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data pasien yang tersedia.</p>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
