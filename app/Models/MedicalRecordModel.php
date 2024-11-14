<?php
namespace App\Models;

use CodeIgniter\Model;

class MedicalRecordModel extends Model {
    protected $table = 'medical_records';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'doctor_id', 'diagnosis', 'treatment', 'visit_date'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Relasi ke Patient
    public function getPatient($patient_id)
    {
        $patientModel = new PatientModel();
        return $patientModel->find($patient_id);  // Ambil data pasien berdasarkan patient_id
    }

    // Relasi ke Doctor
    public function getDoctor($doctor_id)
    {
        $doctorModel = new DoctorModel();
        return $doctorModel->find($doctor_id);  // Ambil data dokter berdasarkan doctor_id
    }

    // Menambahkan relasi untuk mengambil data pasien dan dokter berdasarkan id
    public function getReports($startDate, $endDate)
    {
        return $this->db->table($this->table)
            ->select('medical_records.*, patients.name as patient_name, doctors.name as doctor_name')
            ->join('patients', 'patients.id = medical_records.patient_id')
            ->join('doctors', 'doctors.id = medical_records.doctor_id')
            ->where('visit_date >=', $startDate)
            ->where('visit_date <=', $endDate)
            ->get()
            ->getResultArray();
    }
}
