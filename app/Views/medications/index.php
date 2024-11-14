<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Data Obat
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="data-section">
    <?php if (!empty($medications)): ?>
        <a href="/medications/create" class="btn btn-primary" style="margin-bottom: 20px;">Tambah Obat Baru</a>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Obat</th>
                    <th>Dosis</th>
                    <th>Frekuensi</th>
                    <th>Durasi</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medications as $medication): ?>
                    <tr>
                        <td><?= $medication['id']; ?></td>
                        <td><?= $medication['medication_name']; ?></td>
                        <td><?= $medication['dosage']; ?></td>
                        <td><?= $medication['frequency']; ?></td>
                        <td><?= $medication['duration']; ?></td>
                        <td><?= $medication['notes']; ?></td>
                        <td>
                            <a href="/medications/edit/<?= $medication['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="/medications/delete/<?= $medication['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data obat yang tersedia.</p>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
