<?php
namespace App\Controllers;

use App\Models\MedicalRecordModel;
use App\Models\PatientModel;
use App\Models\DoctorModel;

class MedicalRecordController extends BaseController
{
    protected $medicalRecordModel;

    public function __construct()
    {
        $this->medicalRecordModel = new MedicalRecordModel();
    }

    // Menampilkan data rekam medis
    public function index()
    {
        // Ambil semua data rekam medis
        $data['medical_records'] = $this->medicalRecordModel->findAll();

        // Menambahkan nama pasien dan nama dokter pada setiap rekam medis
        foreach ($data['medical_records'] as &$record) {
            $patientModel = new PatientModel();
            $doctorModel = new DoctorModel();

            $patient = $patientModel->find($record['patient_id']);
            $doctor = $doctorModel->find($record['doctor_id']);

            $record['patient_name'] = $patient ? $patient['name'] : 'Tidak Ditemukan';
            $record['doctor_name'] = $doctor ? $doctor['name'] : 'Tidak Ditemukan';
        }

        return view('medical_records/index', $data);
    }

    public function create()
    {
        $patientModel = new PatientModel();  // Inisialisasi model Patient
        $doctorModel = new DoctorModel();    // Inisialisasi model Doctor

        // Mengambil data pasien dan dokter dari database
        $data['patients'] = $patientModel->findAll();  // Mengambil semua data pasien
        $data['doctors'] = $doctorModel->findAll();    // Mengambil semua data dokter

        // Kirim data pasien dan dokter ke view
        return view('medical_records/create', $data);
    }


    public function store()
    {
        $this->medicalRecordModel->save([
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'diagnosis' => $this->request->getPost('diagnosis'),
            'treatment' => $this->request->getPost('treatment'),
            'visit_date' => $this->request->getPost('visit_date'),
        ]);
        return redirect()->to('/medical-records')->with('success', 'Data rekam medis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $medicalRecordModel = new MedicalRecordModel();
        $patientModel = new PatientModel();
        $doctorModel = new DoctorModel();

        // Ambil data rekam medis berdasarkan ID
        $data['medical_record'] = $medicalRecordModel->find($id);

        // Ambil daftar pasien dan dokter
        $data['patients'] = $patientModel->findAll();
        $data['doctors'] = $doctorModel->findAll();

        return view('medical_records/edit', $data);
    }


    // Memperbarui data rekam medis
    public function update($id)
    {
        $medicalRecordModel = new MedicalRecordModel();

        // Ambil data dari form
        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'diagnosis' => $this->request->getPost('diagnosis'),
            'treatment' => $this->request->getPost('treatment'),
            'visit_date' => $this->request->getPost('visit_date'),
        ];

        // Update data di database
        if ($medicalRecordModel->update($id, $data)) {
            return redirect()->to('/medical-records')->with('success', 'Data rekam medis berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data rekam medis.')->withInput();
        }
    }

    // Menghapus data rekam medis
    public function delete($id)
    {
        $this->medicalRecordModel->delete($id);
        return redirect()->to('/medical-records')->with('success', 'Data rekam medis berhasil dihapus.');
    }
}
