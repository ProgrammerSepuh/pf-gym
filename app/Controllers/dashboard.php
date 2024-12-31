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
        $kedatangan = $this->kehadiranModel->getAllKehadiran();
        $membership = $this->membershipModel->findAll();
    
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
            'kedatangan' => $kedatangan,
            'membership' => $membership
        ];
    
        echo view('dashboard_admin', $data);
    }

    public function reportMember()
    {
        // Ambil semua data kehadiran
        $data = [
            'kehadiran' => $kehadiran
        ];

        return view('admin', $data); 
    }
    
    public function attendance()
    {
        $kehadiran = $this->kehadiranModel->findAll();
        $pager = $this->kehadiranModel->pager;
    
        $data = [
            'kehadiran' => $kehadiran,
            'pager' => $pager
        ];
    
        return view('admin', $data);
    }
    

    public function formAdd()
    {
        if ($this->request->getMethod() === 'post') {
            // Ambil data dari request
            $data = [
                'durasi' => $this->request->getPost('durasi'),
                'jenis_membership' => $this->request->getPost('jenis_membership'),
                'fasilitas' => $this->request->getPost('fasilitas'),
                'harga' => $this->request->getPost('harga'),
            ];
    
            // Simpan data ke database menggunakan model
            $this->membershipModel->save($data);
    
            // Redirect dengan notifikasi sukses
            session()->setFlashdata('alert', 'Membership berhasil ditambahkan!');
            return redirect()->to('/admin#manage-member');
        }
    
        return view('form/membershipForm');
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
        session()->setFlashdata('alert', 'Membership berhasil disimpan!');
        return redirect()->to('/admin#manage-member');
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
        
        // Redirect dengan notifikasi sukses
        session()->setFlashdata('alert', 'Membership berhasil dihapus!');
        return redirect()->to('/admin#manage-member');
    }

    
    public function hadir($id_member)
    {
        // Set zona waktu ke GMT+7 (WIB)
        date_default_timezone_set('Asia/Jakarta');
        
        // Ambil data member berdasarkan ID
        $member = $this->memberModel->find($id_member);
        
        // Validasi apakah member ada
        if (!$member) {
            session()->setFlashdata('error', 'Member tidak ditemukan');
            return redirect()->to('/dashboard');
        }
        
        // Validasi status member
        if (strtolower($member['status']) === 'inactive') {
            session()->setFlashdata('error', 'Member Tidak Aktif, Tidak dapat melakukan Check in');
            return redirect()->to('/admin');
        }
        
        // Membuat instance model kehadiran
        $kehadiranModel = new \App\Models\kehadiranModel();
        
        // Data yang akan disimpan
        $data = [
            'id_member'        => $id_member,
            'tanggal_datang'   => date('Y-m-d 00:00:00'), 
            'waktu'            => date('H:i:s'),           
        ];

        $kehadiranModel->insert($data);
        session()->setFlashdata('success', 'Member ' . $member['nama_member'] . ' berhasil check in hari ini');

        return redirect()->to('/admin');
    }
    
    // ZAKI
    public function member_membership($id){
        $user = $this->memberModel->select('*')->where('id_member', $id)->first();

        $membership = $this->membershipModel->findAll();

        $user = $user['nama_member'];

        $data = [
            'id' => $id,
            'user' => $user,
            'membership' => $membership
        ];

        return view('form/member_membership', $data);
    }

    public function tambah_membership(){

        $id_membership = $this->request->getPost('id_membership');
        
        $id_user = $this->request->getPost('id_user');

        $id_riwayat = rand(1000, 9999);

        $data = [
            'id_riwayat' => '2',
            'status' => 'Active'
        ];

        $this->memberModel->update($id_user, $data);

        return redirect()->to('/member');
    }

        // Halaman Data Member // ZHAXI
        public function dataMember()
        {
            $data = [
                'member' => $this->memberModel->orderBy('id_member','desc')->paginate(6,'member'),
                'pager' => $this->memberModel->pager,
            ];
    
            return view('data-member', $data);
        }
        public function formMember(){
            $member = $this->membershipModel->findAll();
            $data = [
                'member' => $this->membershipModel->findAll()
            ];
    
            return view('form/memberForm', $data);
        }
    
        public function saveMember(){
            $data = [
                $namaMember = $this->request->getpost('namaMember'),
                $password = $this->request->getpost('password'),
                $email = $this->request->getpost('email'),
                $noHp = $this->request->getpost('noHp'),
                $alamat = $this->request->getpost('alamat'),
                $jenis_kelamin = $this->request->getpost('jenis_kelamin'),
                $agama = $this->request->getpost('agama'),
            ];
    
            $this->memberModel->save([
                'nama_member' => $namaMember,
                'password' => $password,
                'email' => $email,
                'nomor_hp' => $noHp,
                'alamat' => $alamat,
                'agama' => $agama,
                'jenis_kelamin' => $jenis_kelamin,
                'status' => 'Inactive'
            ]);
    
        }

}
