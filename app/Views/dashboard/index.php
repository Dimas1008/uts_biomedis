<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Rekam Medis</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <!-- Link Chart.js untuk grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="sidebar">
        <h2>SISTEM REKAM MEDIS</h2>
        <ul>
            <li><a href="/dashboard" class="active">Dashboard</a></li>
            <li><a href="/patients">Data Pasien</a></li>
            <li><a href="/doctors">Data Dokter</a></li>
            <li><a href="/medications">Data Obat</a></li>
            <li><a href="/medical-records">Data Rekam Medis</a></li>
            <!-- <li><a href="/reports">Data Laporan</a></li> -->
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h2>Selamat Datang dan Selamat Bertugas</h2>
        </div>
        <div class="cards">
            <div class="card">
                <h3>Total Pasien</h3>
                <p><?= $total_patients ?? 0; ?></p>
            </div>
            <div class="card">
                <h3>Total Dokter</h3>
                <p><?= $total_doctors ?? 0; ?></p>
            </div>
            <div class="card">
                <h3>Total Obat</h3>
                <p><?= $total_medications ?? 0; ?></p>
            </div>
            <div class="card">
                <h3>Total Rekam Medis</h3>
                <p><?= $total_records ?? 0; ?></p>
            </div>
        </div>
        <div class="chart-container">
            <h3>Data Rekam Medis</h3>
            <canvas id="medicalRecordsChart"></canvas>
        </div>
    </div>
    
    <script>
        const ctx = document.getElementById('medicalRecordsChart').getContext('2d');
        const medicalRecordsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($chart_months ?? []); ?>,
                datasets: [{
                    label: 'Jumlah Rekam Medis',
                    data: <?= json_encode($chart_data ?? []); ?>,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>
