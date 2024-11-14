<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Edit Data Dokter
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="form-container">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/doctors/update/<?= $doctor['id']; ?>" method="post">
        <?= csrf_field(); ?>
        <h3>Formulir Edit Data Dokter</h3>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= $doctor['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="specialization">Spesialisasi</label>
            <input type="text" id="specialization" name="specialization" class="form-control" value="<?= $doctor['specialization']; ?>" required>
        </div>
        <div class="form-group">
            <label for="license_number">No Lisensi</label>
            <input type="text" id="license_number" name="license_number" class="form-control" value="<?= $doctor['license_number']; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Telepon</label>
            <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?= $doctor['phone_number']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/doctors" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>
