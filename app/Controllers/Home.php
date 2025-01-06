<?php

namespace App\Controllers;

use App\Models\memberModel;
use App\Models\MembershipModel;

class Home extends BaseController
{
    protected $memberModel;
    protected $membershipModel;

    public function __Construct(){
        
        // $this->session = \Config\Services::session();
        $this->memberModel = new memberModel;
        $this->membershipModel = new membershipModel;
    }

    public function index()
    {
        $data = ([
            'membership' => $this->membershipModel->findAll(),
            'phone' => '6285157114802', // Ganti dengan nomor telepon tujuan
            'encodedMessage' => urlencode('Halo, saya ingin berlangganan paket membership:'),
        ]);

        echo view('navbar');
        echo view('index', $data);
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
