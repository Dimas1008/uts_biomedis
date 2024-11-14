<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Tambah Data Obat
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="form-container">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/medications/store" method="post">
        <?= csrf_field(); ?>
        <h3>Formulir Tambah Data Obat</h3>

        <div class="form-group">
            <label for="record_id">Record ID</label>
            <input type="number" name="record_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="medication_name">Nama Obat</label>
            <input type="text" id="medication_name" name="medication_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dosage">Dosis</label>
            <input type="text" id="dosage" name="dosage" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="frequency">Frekuensi</label>
            <input type="text" id="frequency" name="frequency" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="duration">Durasi</label>
            <input type="text" id="duration" name="duration" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="notes">Catatan</label>
            <textarea id="notes" name="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/medications" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>
