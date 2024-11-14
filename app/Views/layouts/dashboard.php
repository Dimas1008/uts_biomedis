<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Rekam Medis'; ?></title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>
<body>
    <div class="sidebar">
        <h2>SISTEM REKAM MEDIS</h2>
        <ul>
            <li><a href="/dashboard" class="<?= (current_url() == base_url('/dashboard')) ? 'active' : ''; ?>">Dashboard</a></li>
            <li><a href="/patients" class="<?= (current_url() == base_url('/patients')) ? 'active' : ''; ?>">Data Pasien</a></li>
            <li><a href="/doctors" class="<?= (current_url() == base_url('/doctors')) ? 'active' : ''; ?>">Data Dokter</a></li>
            <li><a href="/medications" class="<?= (current_url() == base_url('/medications')) ? 'active' : ''; ?>">Data Obat</a></li>
            <li><a href="/medical-records" class="<?= (current_url() == base_url('/medical-records')) ? 'active' : ''; ?>">Data Rekam Medis</a></li>
            <!-- <li><a href="/reports" class="<?= (current_url() == base_url('/reports')) ? 'active' : ''; ?>">Data Laporan</a></li> -->
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h2><?= $this->renderSection('header'); ?></h2>
        </div>
        <div class="content">
            <?= $this->renderSection('content'); ?>
        </div>
    </div>
</body>
</html>
