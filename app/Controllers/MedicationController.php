<?php

namespace App\Controllers;

use App\Models\MedicationModel;

class MedicationController extends BaseController 
{
    protected $medicationModel;

    public function __construct() 
    {
        $this->medicationModel = new MedicationModel();
    }

    public function index() 
    {
        $data['medications'] = $this->medicationModel->findAll();
        return view('medications/index', $data);
    }

    public function create() 
    {
        return view('medications/create');
    }

    public function store() 
    {
        $this->medicationModel->save([
            'record_id' => $this->request->getPost('record_id'),
            'medication_name' => $this->request->getPost('medication_name'),
            'dosage' => $this->request->getPost('dosage'),
            'frequency' => $this->request->getPost('frequency'),
            'duration' => $this->request->getPost('duration'),
            'notes' => $this->request->getPost('notes'),
        ]);
        return redirect()->to('/medications')->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit($id) 
    {
        $medication = $this->medicationModel->find($id);

        if (!$medication) {
            return redirect()->to('/medications')->with('error', 'Data obat tidak ditemukan.');
        }

        // Kirim data obat ke view dengan nama variabel yang konsisten
        return view('medications/edit', ['medication' => $medication]);
    }


    public function update($id) 
    {
        $this->medicationModel->update($id, [
            'record_id' => $this->request->getPost('record_id'),
            'medication_name' => $this->request->getPost('medication_name'),
            'dosage' => $this->request->getPost('dosage'),
            'frequency' => $this->request->getPost('frequency'),
            'duration' => $this->request->getPost('duration'),
            'notes' => $this->request->getPost('notes')
        ]);
        return redirect()->to('/medications')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function delete($id) 
    {
        $this->medicationModel->delete($id);
        return redirect()->to('/medications')->with('message', 'Data dokter berhasil dihapus.');
    }
}
