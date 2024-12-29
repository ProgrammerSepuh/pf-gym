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

    public function loginProses(){
        $session = session();
        $usernameOrEmail = $this->request->getPost('usernameOrEmail');
        $password = $this->request->getPost('password');

        $usernameOrEmail = $this->memberModel->where(['nama_member' => $usernameOrEmail])->orWhere(['email' => $usernameOrEmail ])->first();

        if(!$usernameOrEmail){
            session()->setFlashData('pesan', 'username atau email anda salah');
            return redirect()->to('auth');
        };

        if($usernameOrEmail['password'] != $password ){
            session()->setFlashData('pesan', 'password anda salah');
            return redirect()->to('auth');
        }

        $idMember = $usernameOrEmail['id_member'];
        $username = $usernameOrEmail['nama_member'];

        $data = [
            'id_user' => $idMember,
            'username' => $username,
            'isLoggedIn' => true
        ];

        $session->set([
            'id_user' => $idMember,
            'username' => $username,
            'isLoggedIn' => true
        ]);
        return redirect()->to('member');

    }
}
