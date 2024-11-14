<?php
namespace App\Controllers;

use App\Models\PatientModel;
use App\Models\DoctorModel;
use App\Models\MedicationModel;
use App\Models\MedicalRecordModel;

class DashboardController extends BaseController {
    public function index() {
        // Pastikan hanya pengguna yang sudah login dapat mengakses
        if (!session()->has('username')) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Inisialisasi model
        $patientModel = new PatientModel();
        $doctorModel = new DoctorModel();
        $medicationModel = new MedicationModel();
        $recordModel = new MedicalRecordModel();

        // Ambil data untuk statistik
        $total_patients = $patientModel->countAllResults();
        $total_doctors = $doctorModel->countAllResults();
        $total_medications = $medicationModel->countAllResults();
        $total_records = $recordModel->countAllResults();

        // Data grafik
        $chart_months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $chart_data = [];
        for ($month = 1; $month <= 12; $month++) {
            $chart_data[] = $recordModel->where('MONTH(visit_date)', $month)
                                        ->countAllResults();
        }

        // Data utama untuk ditampilkan
        $data = [
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'total_patients' => $total_patients,
            'total_doctors' => $total_doctors,
            'total_medications' => $total_medications,
            'total_records' => $total_records,
            'chart_months' => $chart_months,
            'chart_data' => $chart_data,
            'patients' => $patientModel->findAll(), // Ambil 5 pasien terbaru
            'doctors' => $doctorModel->findAll() // Ambil 5 dokter terbaru
        ];

        return view('dashboard/index', $data);
    }
}
