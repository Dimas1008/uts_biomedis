<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Tambah Data Dokter
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="form-container">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/doctors/store" method="post">
        <?= csrf_field(); ?>
        <h3>Formulir Tambah Data Dokter</h3>
        
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="specialization">Spesialisasi</label>
            <input type="text" id="specialization" name="specialization" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="license_number">No Lisensi</label>
            <input type="text" id="license_number" name="license_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Telepon</label>
            <input type="text" id="phone_number" name="phone_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/doctors" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>
