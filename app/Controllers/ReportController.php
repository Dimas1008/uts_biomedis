<?php

namespace App\Controllers;

use App\Models\MedicalRecordModel;
use App\Models\PatientModel;
use App\Models\DoctorModel;

class ReportController extends BaseController
{
    public function index()
    {
        return view('reports/index');
    }

    public function filter()
    {
        // Mengambil rentang tanggal dari form
        $dateRange = $this->request->getGet('date_range');
        
        // Cek jika date_range ada dan memiliki format yang benar
        if (!empty($dateRange) && strpos($dateRange, ' to ') !== false) {
            // Memisahkan tanggal mulai dan tanggal akhir
            list($startDate, $endDate) = explode(' to ', $dateRange);

            // Mengambil data laporan dari model MedicalRecordModel
            $reportModel = new MedicalRecordModel();
            
            // Mengambil data laporan berdasarkan rentang tanggal
            $reports = $reportModel->where('visit_date >=', $startDate)
                                   ->where('visit_date <=', $endDate)
                                   ->findAll();

            // Mengirim data ke view
            return view('reports/index', [
                'reports' => $reports,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } else {
            // Jika date_range kosong atau tidak sesuai format
            return view('reports/index', ['error' => 'Tanggal yang dipilih tidak valid.']);
        }
    }

    // Menampilkan form untuk membuat laporan baru
    public function create()
    {
        $patientModel = new PatientModel();
        $doctorModel = new DoctorModel();
        $data['patients'] = $patientModel->findAll();
        $data['doctors'] = $doctorModel->findAll();

        return view('reports/create', $data);
    }

    // Menyimpan data laporan baru
    public function store()
    {
        $medicalRecordModel = new MedicalRecordModel();
        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'diagnosis' => $this->request->getPost('diagnosis'),
            'treatment' => $this->request->getPost('treatment'),
            'visit_date' => $this->request->getPost('visit_date'),
        ];

        $medicalRecordModel->save($data);
        return redirect()->to('/reports')->with('success', 'Laporan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit laporan
    public function edit($id)
    {
        $medicalRecordModel = new MedicalRecordModel();
        $patientModel = new PatientModel();
        $doctorModel = new DoctorModel();
        
        $data['report'] = $medicalRecordModel->find($id);
        $data['patients'] = $patientModel->findAll();
        $data['doctors'] = $doctorModel->findAll();

        return view('reports/edit', $data);
    }

    // Memperbarui data laporan
    public function update($id)
    {
        $medicalRecordModel = new MedicalRecordModel();
        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'diagnosis' => $this->request->getPost('diagnosis'),
            'treatment' => $this->request->getPost('treatment'),
            'visit_date' => $this->request->getPost('visit_date'),
        ];

        $medicalRecordModel->update($id, $data);
        return redirect()->to('/reports')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Menghapus laporan
    public function delete($id)
    {
        $medicalRecordModel = new MedicalRecordModel();
        $medicalRecordModel->delete($id);

        return redirect()->to('/reports')->with('success', 'Laporan berhasil dihapus.');
    }
}
