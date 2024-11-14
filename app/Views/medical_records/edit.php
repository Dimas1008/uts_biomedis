<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Edit Data Rekam Medis
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="form-container">

    <!-- Menampilkan pesan error jika ada -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- Menampilkan pesan sukses jika ada -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Form untuk edit data rekam medis -->
    <form action="/medical-records/update/<?= $medical_record['id']; ?>" method="post">
        <?= csrf_field(); ?>
        <h3>Formulir Edit Data Rekam Medis</h3>

        <!-- Dropdown Pasien -->
        <div class="form-group">
            <label for="patient_id">Pasien</label>
            <select name="patient_id" class="form-control" required>
                <option value="">Pilih Pasien</option>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?= $patient['id']; ?>" <?= ($patient['id'] == $medical_record['patient_id']) ? 'selected' : ''; ?>>
                        <?= $patient['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Dropdown Dokter -->
        <div class="form-group">
            <label for="doctor_id">Dokter</label>
            <select name="doctor_id" class="form-control" required>
                <option value="">Pilih Dokter</option>
                <?php foreach ($doctors as $doctor): ?>
                    <option value="<?= $doctor['id']; ?>" <?= ($doctor['id'] == $medical_record['doctor_id']) ? 'selected' : ''; ?>>
                        <?= $doctor['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Diagnosis -->
        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <textarea name="diagnosis" class="form-control" required><?= $medical_record['diagnosis']; ?></textarea>
        </div>

        <!-- Pengobatan -->
        <div class="form-group">
            <label for="treatment">Pengobatan</label>
            <input type="text" name="treatment" class="form-control" value="<?= $medical_record['treatment']; ?>" required>
        </div>

        <!-- Tanggal Periksa -->
        <div class="form-group">
            <label for="visit_date">Tanggal Periksa</label>
            <input type="date" name="visit_date" class="form-control" value="<?= $medical_record['visit_date']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="/medical-records" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>
