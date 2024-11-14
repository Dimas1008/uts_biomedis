<?php
namespace App\Controllers;

use App\Models\PatientModel;

class PatientController extends BaseController {
    protected $patientModel;

    public function __construct() {
        $this->patientModel = new PatientModel();
    }

    public function index() {
        $patientModel = new PatientModel();
        $data = [
            'patients' => $patientModel->findAll(),
            'header' => 'Data Pasien',
        ];

        return view('patients/index', $data);
    }

    public function create() {
        return view('patients/create');
    }

    // Proses penyimpanan data pasien
    public function store() {
        $patientModel = new PatientModel();

        // Validasi input
        $this->validate([
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'birth_date' => 'required|valid_date',
            'phone_number' => 'required|numeric',
        ]);

        // Simpan data ke database
        $patientModel->save([
            'name' => $this->request->getPost('name'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
            'birth_date' => $this->request->getPost('birth_date'),
            'phone_number' => $this->request->getPost('phone_number'),
        ]);

        return redirect()->to('/patients')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit($id) {
        $patientModel = new PatientModel();
        $patient = $patientModel->find($id);

        if (!$patient) {
            return redirect()->to('/patients')->with('error', 'Data pasien tidak ditemukan.');
        }

        return view('patients/edit', ['patient' => $patient]);
    }

    public function update($id) {
        $patientModel = new PatientModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
            'birth_date' => $this->request->getPost('birth_date'),
            'phone_number' => $this->request->getPost('phone_number'),
        ];

        if ($patientModel->update($id, $data)) {
            return redirect()->to('/patients')->with('success', 'Data pasien berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data pasien.')->withInput();
        }
    }

    public function delete($id) {
        $patientModel = new PatientModel();

        // Cek apakah pasien dengan ID tersebut ada di database
        $patient = $patientModel->find($id);

        if (!$patient) {
            return redirect()->to('/patients')->with('error', 'Data pasien tidak ditemukan.');
        }

        // Hapus data pasien
        if ($patientModel->delete($id)) {
            return redirect()->to('/patients')->with('success', 'Data pasien berhasil dihapus.');
        } else {
            return redirect()->to('/patients')->with('error', 'Gagal menghapus data pasien.');
        }
    }
}
