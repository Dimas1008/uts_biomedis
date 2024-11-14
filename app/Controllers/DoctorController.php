<?php

namespace App\Controllers;

use App\Models\DoctorModel;

class DoctorController extends BaseController
{
    protected $doctorModel;

    public function __construct()
    {
        $this->doctorModel = new DoctorModel();
    }

    public function index()
    {
        $data['doctors'] = $this->doctorModel->findAll();
        return view('doctors/index', $data);
    }

    public function create()
    {
        return view('doctors/create');
    }

    public function store()
    {
        $this->doctorModel->save([
            'name' => $this->request->getPost('name'),
            'specialization' => $this->request->getPost('specialization'),
            'license_number' => $this->request->getPost('license_number'),
            'phone_number' => $this->request->getPost('phone_number'),
        ]);
        return redirect()->to('/doctors')->with('message', 'Dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['doctor'] = $this->doctorModel->find($id);
        return view('doctors/edit', $data);
    }

    public function update($id)
    {
        $this->doctorModel->update($id, [
            'name' => $this->request->getPost('name'),
            'specialization' => $this->request->getPost('specialization'),
            'license_number' => $this->request->getPost('license_number'),
            'phone_number' => $this->request->getPost('phone_number'),
        ]);
        return redirect()->to('/doctors')->with('message', 'Data dokter berhasil diubah.');
    }

    public function delete($id)
    {
        $this->doctorModel->delete($id);
        return redirect()->to('/doctors')->with('message', 'Data dokter berhasil dihapus.');
    }
}
