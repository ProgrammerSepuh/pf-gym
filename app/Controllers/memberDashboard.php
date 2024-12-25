<?php

namespace App\Controllers;

use App\Models\memberModel;


class memberDashboard extends BaseController {
    
    // Dashboard member
    public function member() {
        echo view('dashboard_member');
    }
}