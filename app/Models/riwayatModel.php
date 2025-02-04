<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    protected $table = 'riwayat';
    protected $primaryKey = 'id_riwayat';
    protected $allowedFields = ['id_member', 'deskripsi', 'tanggal', 'id_membership'];
}
