<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header'); ?>
Tambah Data Pasien
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="form-container">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/patients/store" method="post">
        <?= csrf_field(); ?>
        <h3>Formulir Tambah Data Pasien</h3>
        
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="Male">Laki-laki</option>
                <option value="Female">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="birth_date">Tanggal Lahir</label>
            <input type="date" id="birth_date" name="birth_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Telepon</label>
            <input type="text" id="phone_number" name="phone_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/patients" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>
