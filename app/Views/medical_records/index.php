<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Data Medical Record
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="data-section">
    <?php if (!empty($medical_records)): ?>
        <a href="/medical-records/create" class="btn btn-primary" style="margin-bottom: 20px;">Tambah Data</a>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Periksa</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Diagnosis</th>
                    <th>Pengobatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medical_records as $record): ?>
                <tr>
                    <td><?= $record['id']; ?></td>
                    <td><?= $record['visit_date']; ?></td>
                    <td><?= $record['patient_name']; ?></td> <!-- Menampilkan Nama Pasien -->
                    <td><?= $record['doctor_name']; ?></td> <!-- Menampilkan Nama Dokter -->
                    <td><?= $record['diagnosis']; ?></td>
                    <td><?= $record['treatment']; ?></td>
                    <td>
                        <a href="/medical-records/edit/<?= $record['id']; ?>" class="btn btn-success">Edit</a>
                        <a href="/medical-records/delete/<?= $record['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data record yang tersedia.</p>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
