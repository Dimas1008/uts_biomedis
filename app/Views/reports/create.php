<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Tambah Data Laporan
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="form-container">
    <form action="/reports/store" method="post">
        <?= csrf_field(); ?>
        <h3>Formulir Tambah Data Laporan</h3>

        <div class="form-group">
            <label for="patient_id">Pasien</label>
            <select name="patient_id" class="form-control" required>
                <option value="">Pilih Pasien</option>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?= $patient['id']; ?>"><?= $patient['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="doctor_id">Dokter</label>
            <select name="doctor_id" class="form-control" required>
                <option value="">Pilih Dokter</option>
                <?php foreach ($doctors as $doctor): ?>
                    <option value="<?= $doctor['id']; ?>"><?= $doctor['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <textarea name="diagnosis" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="treatment">Pengobatan</label>
            <input type="text" name="treatment" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="visit_date">Tanggal Periksa</label>
            <input type="date" name="visit_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/reports" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>