<?php

namespace App\Controllers;

use App\Models\memberModel;

class memberDashboard extends BaseController {
    protected $memberModel;

    public function __construct() {
        $this->memberModel = new memberModel();
    }

    public function member() {
        $session = session();

        // Periksa apakah user sudah login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('auth'); // Redirect jika belum login
        }

        // Ambil ID user dari session
        $id_user = $session->get('id_user');

        // Dapatkan detail member dengan sisa hari
        $memberData = $this->memberModel->getMemberWithSisaHari($id_user);

        // Jika data tidak ditemukan, redirect ke login
        if (!$memberData) {
            return redirect()->to('auth');
        }

        // Kirim data member ke view
        echo view('dashboard_member', ['member' => $memberData]);
    }

    public function logout() {
        $session = session();

        // Hapus semua data session
        $session->destroy();

        // Redirect ke halaman login
        return redirect()->to('auth');
    }
    
    public function updateProfile() {
        $session = session();
        $id_user = $session->get('id_user');

        // Ambil data yang dikirim dari form
        $data = [
            'nama_member' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'nomor_hp' => $this->request->getPost('phone_number'),
            'password' => $this->request->getPost('password')
        ];

        // Update data member
        $this->memberModel->update($id_user, $data);

        // Redirect ke halaman dashboard setelah update
        return redirect()->to('/member');
    }
    
}
