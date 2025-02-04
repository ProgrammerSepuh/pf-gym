<?php

namespace App\Models;

use CodeIgniter\Model;

class MembershipModel extends Model
{
    protected $table      = 'membership';
    protected $primaryKey = 'id_membership';
    protected $allowedFields = ['jenis_membership', 'harga', 'durasi', 'fasilitas', 'tipe_member'];
}
