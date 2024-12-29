<?php

namespace App\Controllers;

use App\Models\memberModel;
use App\Models\membershipModel;
use App\Models\riwayatModel;
use App\Models\kehadiranModel;

class dashboard extends BaseController
{
    protected $memberModel;
    protected $membershipModel;
    protected $riwayatModel;
    protected $kehadiranModel; 

    public function __Construct(){
        $this->session = \Config\Services::session();
        $this->memberModel = new memberModel;
        $this->membershipModel = new membershipModel;
        $this->riwayatModel = new riwayatModel;
        $this->kehadiranModel = new kehadiranModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('search'); 
        $date = date('m');
    
        // Cek apakah ada keyword pencarian
        if ($keyword) {
            $this->memberModel
                ->like('nama_member', $keyword)
                ->orLike('email', $keyword)
                ->orLike('nomor_hp', $keyword);
        }
    
        $memberBaru = $this->memberModel->select('*')->where('MONTH(tanggal)', $date)->countAllResults();
        $totalmember = $this->memberModel->countAll();
        $totalAktif = $this->memberModel->where('status', 'tidak')->countAllResults();
        $totalNoAktif = $this->memberModel->where('status', 'aktif')->countAllResults();
        $kehadiran = $this->kehadiranModel->findAll();
    
        $member = $this->memberModel->joinmembership();
        
        $data = [
            'totalMember' => $totalmember,
            'aktif' => $totalAktif,
            'tidak' => $totalNoAktif,
            'baru' => $memberBaru,
            'member' => $member,
            'pager' => $this->memberModel->pager,
            'search' => $keyword,
            'kehadiran' => $kehadiran,
        ];
    
        echo view('dashboard_admin', $data);
    }

    public function reportMember()
    {
        // Ambil semua data kehadiran
        $kehadiran = $this->kehadiranModel->getAllKehadiran();

        // Kirim data kehadiran ke view report-member
        $data = [
            'kehadiran' => $kehadiran
        ];

        return view('admin', $data);  // Pastikan ini sesuai dengan view yang Anda gunakan
    }
    
    public function attendance()
    {
        $perPage = 10;
        $kehadiran = $this->kehadiranModel->paginate($perPage, 'attendance');
        $pager = $this->kehadiranModel->pager;
    
        $data = [
            'kehadiran' => $kehadiran,
            'pager' => $pager
        ];
    
        return view('admin', $data);
    }
    

    public function formAdd()
    {
        $membership = $this->membershipModel->findAll();

        $data = [
            'membership' => $membership
        ];
        echo view('form/membershipForm', $data);
    }

    public function save()
    {
        $namaMebership = $this->request->getPost('namaMembership');
        $harga = $this->request->getPost('harga');
        $durasi = $this->request->getPost('durasi');
        $fasilitas = $this->request->getPost('fasilitas');

        $this->membershipModel->save([
            'jenis_membership' => $namaMebership,
            'harga' => $harga,
            'durasi' => $durasi,
            'fasilitas' => $fasilitas,
        ]);
        return redirect()->to('/dashboard/membership');
    }

    public function membership()
    {
        $idUser = $this->session->get('id_user');
        $username = $this->session->get('username');

        $membership = $this->membershipModel->findAll();

        $data = [
            'username' => $username,
            'membership' => $membership
        ];
        echo view('membership', $data);
    }

    public function delete($id)
    {
        $this->membershipModel->delete($id);
        return redirect()->to('/dashboard/membership');
    }

    
    public function hadir($id_member)
    {
        // Set zona waktu ke GMT+7 (WIB)
        date_default_timezone_set('Asia/Jakarta');
        
        $member = $this->memberModel->find($id_member);
        
        if (!$member) {
            session()->setFlashdata('error', 'Member tidak ditemukan');
            return redirect()->to('/dashboard');
        }
        
        if (strtolower($member['status']) === 'inactive') {
            session()->setFlashdata('error', 'Member Tidak Aktif, Tidak dapat melakukan Check in');
            return redirect()->to('/admin');
        }
        
        $kehadiranModel = new \App\Models\kehadiranModel();
        
        $data = [
            'id_member' => $id_member,
            'tanggal' => date('Y-m-d'), 
            'waktu' => date('H:i:s'),  
        ];
        
        $kehadiranModel->insert($data);
        
        session()->setFlashdata('success', 'Member ' . $member['nama_member'] . ' berhasil check in hari ini');
        return redirect()->to('/admin');
    }
       
}
