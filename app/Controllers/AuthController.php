<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController {
    public function login() {
        // Ambil pesan error dari session jika ada
        $data['error'] = session()->getFlashdata('error');
        return view('auth/login', $data);
    }

    public function authenticate() {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari pengguna berdasarkan username
        $user = $model->where('username', $username)->first();
    
        if ($user) {
            // Verifikasi password
            if ($password == $user['password']) {
                // Simpan informasi pengguna di session
                $session->set(['username' => $user['username'], 'role' => $user['role']]);
                return redirect()->to('/dashboard');
            } else {
                // Password salah
                $session->setFlashdata('error', 'Password salah. Silakan coba lagi.');
            }
        } else {
            // Username tidak ditemukan
            $session->setFlashdata('error', 'Username tidak ditemukan. Silakan coba lagi.');
        }

        return redirect()->back();
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout.');
    }
    
}
