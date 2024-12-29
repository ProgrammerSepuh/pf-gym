<?php

namespace App\Models;

use CodeIgniter\Model;

class membershipModel extends Model
{
    protected $table      = 'membership';
    protected $primaryKey = 'id_membership';
    protected $allowedFields = ['jenis_membership', 'fasilitas', 'durasi', 'harga'];
}