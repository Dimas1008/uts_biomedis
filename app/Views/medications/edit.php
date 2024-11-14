<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Edit Data Obat
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="form-container">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/medications/update/<?= $medication['id']; ?>" method="post">
        <?= csrf_field(); ?>
        <h3>Formulir Edit Data Obat</h3>
        <div class="form-group">
            <label>Record ID</label>
            <input type="number" name="record_id" class="form-control" value="<?= $medication['record_id']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Obat</label>
            <input type="text" name="medication_name" class="form-control" value="<?= $medication['medication_name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Dosis</label>
            <input type="text" name="dosage" class="form-control" value="<?= $medication['dosage']; ?>" required>
        </div>
        <div class="form-group">
            <label>Frekuensi</label>
            <input type="text" name="frequency" class="form-control" value="<?= $medication['frequency']; ?>" required>
        </div>
        <div class="form-group">
            <label>Durasi</label>
            <input type="text" name="duration" class="form-control" value="<?= $medication['duration']; ?>" required>
        </div>
        <div class="form-group">
            <label>Catatan</label>
            <textarea name="notes" class="form-control"><?= $medication['notes']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
<?= $this->endSection(); ?>
