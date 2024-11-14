<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Data Laporan
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="form-container">
    <!-- Form untuk memilih rentang tanggal -->
    <form action="/reports/filter" method="get">
        <div class="form-group">
            <label for="date_range">Tanggal</label>
            <select name="date_range" id="date_range" class="form-control">
                <option value="">Pilih Rentang Tanggal</option>
                <option value="2024-06-23 to 2024-07-22">06/23/2024 to 07/22/2024</option>
                <option value="2024-08-01 to 2024-08-15">08/01/2024 to 08/15/2024</option>
                <option value="2024-09-01 to 2024-09-10">09/01/2024 to 09/10/2024</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cetak</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </form>

    <!-- Menampilkan error jika tanggal tidak valid -->
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <!-- Menampilkan data laporan berdasarkan tanggal yang dipilih -->
    <?php if (!empty($reports)): ?>
        <h4>Laporan dari <?= $startDate ?> hingga <?= $endDate ?></h4>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Diagnosis</th>
                    <th>Tanggal Periksa</th>
                    <th>Pengobatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $index => $report): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $report['patient_name']; ?></td>
                        <td><?= $report['doctor_name']; ?></td>
                        <td><?= $report['diagnosis']; ?></td>
                        <td><?= $report['visit_date']; ?></td>
                        <td><?= $report['treatment']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data laporan untuk tanggal yang dipilih.</p>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
