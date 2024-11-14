<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Edit Data Laporan
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="form-container">
    <form action="/reports/update/<?= $report['id']; ?>" method="post">
        <?= csrf_field(); ?>
        <h3>Formulir Edit Data Laporan</h3>

        <div class="form-group">
            <label for="patient_id">Pasien</label>
            <select name="patient_id" class="form-control" required>
                <option value="">Pilih Pasien</option>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?= $patient['id']; ?>" <?= ($patient['id'] == $report['patient_id']) ? 'selected' : ''; ?>>
                        <?= $patient['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="doctor_id">Dokter</label>
            <select name="doctor_id" class="form-control" required>
                <option value="">Pilih Dokter</option>
                <?php foreach ($doctors as $doctor): ?>
                    <option value="<?= $doctor['id']; ?>" <?= ($doctor['id'] == $report['doctor_id']) ? 'selected' : ''; ?>>
                        <?= $doctor['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <textarea name="diagnosis" class="form-control" required><?= $report['diagnosis']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="treatment">Pengobatan</label>
            <input type="text" name="treatment" class="form-control" value="<?= $report['treatment']; ?>" required>
        </div>

        <div class="form-group">
            <label for="visit_date">Tanggal Periksa</label>
            <input type="date" name="visit_date" class="form-control" value="<?= $report['visit_date']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="/reports" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>
