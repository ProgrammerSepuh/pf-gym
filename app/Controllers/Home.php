<?php

namespace App\Controllers;

use App\Models\memberModel;

class Home extends BaseController
{
    protected $memberModel;

    public function __Construct(){

        // $this->session = \Config\Services::session();
        $this->memberModel = new memberModel;
    }

    public function index()
    {
        echo view('navbar');
        echo view('index');
        echo view('footer');
    }

    public function login(){
        echo view('login');
    }

    public function loginProses()
    {
        $session = session();
        $usernameOrEmail = $this->request->getPost('usernameOrEmail');
        $password = $this->request->getPost('password');
    
        // Mencari pengguna berdasarkan nama_member atau email
        $user = $this->memberModel->where(['nama_member' => $usernameOrEmail])
                                  ->orWhere(['email' => $usernameOrEmail])
                                  ->first();
    
        // Jika pengguna tidak ditemukan
        if (!$user) {
            session()->setFlashData('pesan', 'Username atau email Anda salah');
            return redirect()->to('/auth'); 
        }
    
        // Verifikasi password
        if ($user['password'] !== $password) {
            session()->setFlashData('pesan', 'Password Anda salah');
            return redirect()->to('/auth'); 
        }
    
        // Jika valid, set data sesi dan arahkan ke dashboard admin
        $data = [
            'id_user' => $user['id_member'],
            'username' => $user['nama_member'],
            'isLoggedIn' => true
        ];
        $session->set($data);
    
        return redirect()->to('admin');
    }
    
}