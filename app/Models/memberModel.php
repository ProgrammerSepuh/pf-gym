<?php

namespace App\Models;

use CodeIgniter\Model;

class memberModel extends Model
{
    protected $table      = 'member';
    protected $primaryKey = 'id_member';

    protected $allowedFields = [
    'nama_member', 'email', 'nomor_hp', 'password' , 'alamat', 'agama', 'jenis_kelamin', 'status', 'tanggal_akhir'
    ];

    public function getMemberWithSisaHari($id_member)
    {
        $member = $this->select('*')
                       ->where('member.id_member', $id_member)
                       ->first();

        // Hitung sisa hari
        if (!empty($member['tanggal_akhir'])) {
            $tanggalAkhir = strtotime($member['tanggal_akhir']);
            $today = strtotime(date('Y-m-d')); // Tanggal sekarang
            $selisihDetik = $tanggalAkhir - $today;

            // Konversi ke hari
            $member['sisa_hari'] = $selisihDetik > 0 ? floor($selisihDetik / (60 * 60 * 24)) : 0;
        } else {
            $member['sisa_hari'] = 0; // Default jika tanggal_akhir tidak ada
        }

        return $member;
    }
}