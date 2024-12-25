<?php

namespace App\Controllers;

use App\Models\memberModel;

class dashboard extends BaseController
{
    protected $memberModel;

    public function __Construct(){

        // $this->session = \Config\Services::session();
        $this->memberModel = new memberModel;
    }

    public function index()
    {
        // $idUser = $this->session->get('id_user');
        // $username = $this->session->get('username');

        $totalmember = $this->memberModel->countAll();
        $totalAktif = $this->memberModel->where('status', 'tidak')->countAllResults();
        $totalNoAktif = $this->memberModel->where('status', 'aktif')->countAllResults();
        $data = [
            'totalMember' => $totalmember,
            'aktif' =>$totalAktif,
            'tidak' =>$totalNoAktif,
            // 'member' => $username,
        ];
        // dd($totalmember);
        echo view('dashboard_admin', $data);
    }
}