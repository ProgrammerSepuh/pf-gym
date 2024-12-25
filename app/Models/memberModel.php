<?php

namespace App\Models;

use CodeIgniter\Model;

class memberModel extends Model
{
    protected $table      = 'member';
    protected $primaryKey = 'id_member';

    public function joinMembership(){
        return $this->select('member.* , riwayat_membership.tanggal_akhir')->JOIN('riwayat_membership', 'member.id_riwayat = riwayat_membership.id_riwayat', 'left')->findAll();
    }
}