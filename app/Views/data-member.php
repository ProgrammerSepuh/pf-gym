<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="brand-title">
            <a href="<?php echo base_url("/")?>" style="text-decoration: none; color: black">
                PF <span style="color: red;">GYM</span> & FITNESS
            </a>
        </div>
        <a href="<?php echo base_url("profile")?>" class="user-button">
            <span class="username">ADMIN</span>
            <div class="profile-icon"><i class="fas fa-user"></i></div>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="menu-title">Menu</div>
            
            <!-- Dashboard -->
            <a href="<?= base_url('/admin') ?>" class="menu-item <?= (uri_string() == 'admin') ? 'active' : '' ?>">
                <div class="icon-box"><i class="fas fa-chart-line"></i></div> 
                Dashboard
            </a>
            
            <!-- Data Member -->
            <a href="<?= base_url('/member') ?>" class="menu-item <?= (uri_string() == 'member') ? 'active' : '' ?>">
                <div class="icon-box"><i class="fas fa-user"></i></div>
                Data Member
            </a>
            
            <!-- Manage Membership -->
            <a href="<?= base_url('/manage-membership') ?>" class="menu-item <?= (uri_string() == 'manage-membership') ? 'active' : '' ?>">
                <div class="icon-box"><i class="fas fa-file-alt"></i></div> 
                Manage Membership
            </a>
            
            <!-- Attendance Member -->
            <a href="<?= base_url('/attendance-member') ?>" class="menu-item <?= (uri_string() == 'attendance-member') ? 'active' : '' ?>">
                <div class="icon-box"><i class="fas fa-calendar-check"></i></div>
                Attendance Member
            </a>
            
            <!-- Report Member -->
            <a href="<?= base_url('/report-member') ?>" class="menu-item <?= (uri_string() == 'report-member') ? 'active' : '' ?>">
                <div class="icon-box"><i class="fas fa-chart-pie"></i></div> 
                Report Member
            </a>
        </div>
        
        <!-- Logout -->
        <button class="logout-button" onclick="window.location='<?= base_url('/logout') ?>'">
            <div class="icon-circle"><i class="fas fa-arrow-left"></i></div>
            Logout
        </button>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Fungsi Alert -->
        <?php if (session()->has('error')): ?>
            <div class="alert error" style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('success')): ?>
            <div class="alert success" style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Data Member -->
        <div id="data-member" class="menu-content">
            <h2>Data Member</h2>
        </div>
        
    </div>
</body>
</html>
