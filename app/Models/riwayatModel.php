<?php

namespace App\Models;

use CodeIgniter\Model;

class riwayatModel extends Model
{
    protected $table      = 'riwayat';
    protected $primaryKey = 'id_riwayat';

    protected $allowedFields = [
        'id_member', 'id_membership'
    ];

}