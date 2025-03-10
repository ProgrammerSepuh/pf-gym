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

        $tanggal_sekarang = date('Y-m-d');

        // Update status menjadi 'Inactive' untuk semua member yang tanggal_akhir < tanggal_sekarang
        $this->memberModel->where('tanggal_akhir <', $tanggal_sekarang)->set('status', 'Inactive')->update();
        
    
        // Cek apakah ada keyword pencarian
        if ($keyword) {
            $this->memberModel
                ->like('nama_member', $keyword)
                ->orLike('email', $keyword)
                ->orLike('nomor_hp', $keyword);
        }
    
        $memberBaru = $this->memberModel->select('*')->where('MONTH(tanggal)', $date)->countAllResults();
        $totalmember = $this->memberModel->countAll();
        $totalAktif = $this->memberModel->where('status', 'Active')->countAllResults();
        $totalNoAktif = $this->memberModel->where('status', 'Inactive')->countAllResults();
        $kehadiran = $this->kehadiranModel->findAll();
        $kedatangan = $this->kehadiranModel->getAllKehadiran();
        $membership = $this->membershipModel->findAll();
        $member = $this->memberModel->paginate(6, 'member');
        $hadir = $this->memberModel->findAll();
        
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
            'membership' => $membership,
            'hadir' => $hadir
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
            $data = [
                'jenis_membership'  => $this->request->getPost('jenis_membership'), 
                'harga'             => $this->request->getPost('harga'),
                'durasi'            => $this->request->getPost('durasi'),
                'fasilitas'         => $this->request->getPost('fasilitas'),
                'tipe_member'       => $this->request->getPost('tipe_member'), 
            ];
    
            $this->membershipModel->save($data);
    
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
        $data =([
            'id_membership' => null
        ]);
        $this->riwayatModel->where('id_membership', $id)->set($data)->update();
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
    
        // Cek apakah tipe_member adalah 'visit'
        if (isset($member['tipe_member']) && $member['tipe_member'] === 'visit') {
            // Update status member menjadi 'inactive' dan set tanggal_akhir menjadi tanggal sekarang
            $this->memberModel->update($id_member, [
                'status' => 'inactive',
                'tanggal_akhir' => date('Y-m-d') // Set tanggal_akhir ke tanggal sekarang
            ]);
        }

        // Cek apakah sisa_hari = 1
        if ($member['sisa_hari'] === 1) {
            // Gunakan query builder untuk update status dan tanggal_akhir
            $this->db->table('member')
                ->set('status', 'inactive')
                ->set('tanggal_akhir', date('Y-m-d')) // Set tanggal_akhir ke tanggal sekarang
                ->where('id_member', $id_member)
                ->update();
        }

        // Cek apakah tipe_member adalah 'visit'
        if (isset($member['tipe_member']) && $member['tipe_member'] === 'visit') {
            // Update status member menjadi 'inactive' dan set tanggal_akhir menjadi tanggal sekarang
            $this->memberModel->updateStatusAndTanggalAkhir($id_member, 'inactive', date('Y-m-d'));
        }

    
        // Membuat instance model kehadiran
        $kehadiranModel = new \App\Models\KeahadiranModel();
        
        // Data yang akan disimpan
        $data = [
            'id_member'        => $id_member,
            'tanggal_datang'   => date('Y-m-d 00:00:00'), 
            'waktu'            => date('H:i:s'),           
        ];
    
        // Insert data ke tabel kehadiran
        $kehadiranModel->insert($data);
    
        // Sukses check-in
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
        
        $id_member = $this->request->getPost('id_user');

        $tanggal_sekarang = date('Y-m-d');

         $this->riwayatModel->save([
             'id_member' => $id_member,
             'id_membership' => $id_membership,
         ]);

        $durasi = $this->membershipModel->select('durasi')->where('id_membership', $id_membership)->first();
        $tanggal = $this->memberModel->select('tanggal_akhir')->where('id_member', $id_member)->first();

        $tanggal_akhir = strtotime($tanggal['tanggal_akhir']);

        $tanggal_sekarang = strtotime($tanggal_sekarang);

        $durasi = $durasi['durasi'];

        if ( $tanggal_akhir < $tanggal_sekarang) {
            $tanggal_baru = strtotime("$durasi days", $tanggal_sekarang);
            $tanggal = date('Y-m-d', $tanggal_baru);

            $data = [
                'tanggal_akhir' => $tanggal,
                'status' => 'Active'
            ];
            $this->memberModel->update($id_member, $data);
        } else {
            $tanggal_baru = strtotime("+$durasi days", $tanggal_akhir);
            
            $tanggal = date('Y-m-d', $tanggal_baru);

            $data = [
                'tanggal_akhir' => $tanggal,
                'status' => 'Active'
            ];
            $this->memberModel->update($id_member, $data);
        }

        return redirect()->to('data-member');
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
                $namaMember = $this->request->getpost('nama_member'),
                $password = $this->request->getpost('password'),
                $email = $this->request->getpost('email'),
                $noHp = $this->request->getpost('no_hp'),
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
                'status' => 'Inactive',
                'tanggal_akhir' => date('Y-m-d')
            ]);

            return redirect()->to('data-member');
        }

        // Hapus Data Member
        public function hapusMember($id_member)
        {
            $memberModel = new \App\Models\MemberModel();
            $kehadiranModel = new \App\Models\KehadiranModel();
            $riwayatModel = new \App\Models\RiwayatModel();
        
            // Cek apakah member ada
            $member = $memberModel->find($id_member);
            if (!$member) {
                return redirect()->to('/data-member')->with('error', 'Member tidak ditemukan!');
            }
        
            // Hapus data terkait di tabel kehadiran dan riwayat
            $kehadiranModel->where('id_member', $id_member)->delete();
            $riwayatModel->where('id_member', $id_member)->delete();
        
            // Hapus data member setelah data terkait dihapus
            $memberModel->delete($id_member);
        
            return redirect()->to('/data-member')->with('success', 'Member berhasil dihapus!');
        }

        public function exportCsv($config = [])
        {
            // Konfigurasi default
            $defaultConfig = [
                'filename' => 'report_member_' . date('Ymd'),
                'delimiter' => ',',
                'group_by' => 'tanggal_datang', // Kolom untuk pengelompokan, kosongkan jika tidak ingin dikelompokkan
                'fields' => [ // Daftar kolom yang akan diekspor
                    'nama_member' => 'Nama Member',
                    'tanggal_datang' => 'Tanggal Datang',
                    'waktu' => 'Waktu'
                ],
                'order_by' => ['tanggal_datang' => 'ASC'],
                'conditions' => [] // Kondisi WHERE tambahan
            ];
    
            // Gabungkan konfigurasi default dengan konfigurasi yang diberikan
            $config = array_merge($defaultConfig, $config);
    
            // Bangun query dasar
            $query = $this->kehadiranModel->select(array_keys($config['fields']));
            
            // Tambahkan join yang diperlukan
            $query->join('member', 'member.id_member = kehadiran.id_member');
    
            // Tambahkan kondisi WHERE jika ada
            foreach ($config['conditions'] as $field => $value) {
                $query->where($field, $value);
            }
    
            // Tambahkan pengurutan
            foreach ($config['order_by'] as $field => $direction) {
                $query->orderBy($field, $direction);
            }
    
            // Ambil data
            $data = $query->findAll();
    
            // Inisialisasi konten file
            $fileContent = '';
    
            if ($config['group_by']) {
                // Kelompokkan data berdasarkan kolom yang ditentukan
                $groupedData = [];
                foreach ($data as $row) {
                    $groupKey = $row[$config['group_by']];
                    if (!isset($groupedData[$groupKey])) {
                        $groupedData[$groupKey] = [];
                    }
                    $groupedData[$groupKey][] = $row;
                }
    
                // Generate konten CSV untuk data yang dikelompokkan
                foreach ($groupedData as $groupKey => $records) {
                    $fileContent .= "Kelompok: " . $groupKey . "\n";
                    
                    // Tambahkan header
                    $headers = array_values($config['fields']);
                    $fileContent .= implode($config['delimiter'], $headers) . "\n";
    
                    // Tambahkan data
                    foreach ($records as $row) {
                        $line = [];
                        foreach (array_keys($config['fields']) as $field) {
                            $line[] = $this->formatCsvField($row[$field]);
                        }
                        $fileContent .= implode($config['delimiter'], $line) . "\n";
                    }
    
                    $fileContent .= "\n"; // Baris kosong antara kelompok
                }
            } else {
                // Generate konten CSV untuk data tidak dikelompokkan
                // Tambahkan header
                $headers = array_values($config['fields']);
                $fileContent .= implode($config['delimiter'], $headers) . "\n";
    
                // Tambahkan data
                foreach ($data as $row) {
                    $line = [];
                    foreach (array_keys($config['fields']) as $field) {
                        $line[] = $this->formatCsvField($row[$field]);
                    }
                    $fileContent .= implode($config['delimiter'], $line) . "\n";
                }
            }
    
            // Set response header dan return file
            return $this->response
                ->setHeader('Content-Type', 'text/csv')
                ->setHeader('Content-Disposition', 'attachment; filename="' . $config['filename'] . '.csv"')
                ->setBody($fileContent);
        }
    
        /**
         * Format nilai field untuk CSV
         * 
         * @param mixed $value
         * @return string
         */
        private function formatCsvField($value)
        {
            // Escape quotes dan wrap dalam quotes jika diperlukan
            if (strpos($value, ',') !== false || strpos($value, '"') !== false || strpos($value, "\n") !== false) {
                return '"' . str_replace('"', '""', $value) . '"';
            }
            return $value;
        }

}

