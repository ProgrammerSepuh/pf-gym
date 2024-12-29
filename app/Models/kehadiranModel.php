<?php

namespace App\Models;

use CodeIgniter\Model;

class kehadiranModel extends Model
{
    protected $table = 'kehadiran';  
    protected $primaryKey = 'id_kedatangan';
    protected $allowedFields = ['id_member', 'tanggal', 'waktu'];

    public function getAllKehadiran()
    {
        return $this->join('member', 'member.id_member = kehadiran.id_member') 
        ->findAll();
    }
}