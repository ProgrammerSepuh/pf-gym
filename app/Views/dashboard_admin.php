<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: transparent;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #ddd;
            z-index: 10;
        }

        .navbar .brand-title {
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 400;
            font-size: 2em;
            color: black;
        }

        .navbar .user-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar .user-button {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: black;
            font-weight: 500;
            transition: background-color 0.3s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar .user-button:hover {
            background-color: #f5f5f5;
            color: black;
        }

        .navbar .profile-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ddd;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 1.2em;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 350px;
            background-color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 85px;
            bottom: 0;
        }

        .sidebar .menu-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 0.9em;
            font-weight: 100;
            color: gray;
            margin-bottom: 20px;
        }

        .sidebar .menu-item {
            width: 100%;
            padding: 8px 12px;
            text-align: left;
            border-radius: 5px;
            font-size: 0.9em;
            font-weight: 500;
            color: gray;
            background-color: #f0f0f0;
            cursor: pointer;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .sidebar .menu-item:hover {
            background-color: #e0e0e0;
        }

        .sidebar .menu-item.active {
            background-color: #007BFF;
            color: white;
        }

        .sidebar .menu-item .icon-box {
            width: 30px;
            height: 30px;
            border-radius: 5px;
            background-color: gray;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .sidebar .menu-item.active .icon-box {
            background-color: white;
            color: #007BFF;
        }

        /* Main Content */
        .content {
            margin-left: 370px; 
            padding: 30px;
            flex-grow: 1;
            margin-top: 85px; 
        }

        .content .menu-content {
            display: none;
            text-align: center;
            padding: 50px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }

        .content .menu-content.active {
            display: block;
        }

        /* Logout Button */
        .logout-button {
            width: 100%;
            padding: 10px 15px;
            text-align: left;
            border-radius: 5px;
            font-size: 0.9em;
            font-weight: 500;
            color: white;
            background-color: #d9534f;
            cursor: pointer;
            margin-top: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border:none;
        }

        .logout-button:hover {
            background-color: #c9302c;
        }

        /* Tambahan */
        .dashboard-stats {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
        }

        .dashboard-card {
            background-color: #E4E7F5;
            border-radius: 2px;
            padding: 20px;
            flex: 1;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            margin-bottom: 10px;
            color: #333;
        }

        .dashboard-card .number {
            font-family: 'Poppins', sans-serif;
            font-size: 2em;
            font-weight: 600;
            color: #007BFF;
        }

        /* New styles for member information table */
        .member-info-section {
            margin-top: 30px;
        }

        .member-info-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Poppins', sans-serif;
        }

        .member-info-table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            padding: 12px 15px;
            font-weight: 500;
        }

        .member-info-table th:nth-child(1), 
        .member-info-table th:nth-last-child(1) {
            text-align: center;
        }

        .member-info-table th:not(:nth-child(1)):not(:nth-last-child(1)) {
            text-align: left;
        }

        .member-info-table td {
            border-bottom: 1px solid #dee2e6;
            padding: 12px 15px;
        }

        .member-info-table td:nth-child(1), 
        .member-info-table td:nth-last-child(1) {
            text-align: center;
        }

        .member-info-table td:not(:nth-child(1)):not(:nth-last-child(1)) {
            text-align: left;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8em;
            font-weight: 600;
            text-transform: uppercase;
            width: 100px;
            text-align: center;
        }

        .aktif {
            background-color: #28a745;
            color: white;
        }

        .tidak {
            background-color: #dc3545;
            color: white;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8em;
            font-weight: 600;
            text-transform: uppercase;
            width: 100px;
            text-align: center;
        }
        
        .status-badge.active {
            background-color: #28a745; /* Green for active */
            color: white;
        }
        
        .status-badge.inactive {
            background-color: #dc3545; /* Red for inactive */
            color: white;
        }
        
        /* Alert Styles */
        .alert {
            position: relative;
            margin: 10px 0;
            padding: 12px;
            border-radius: 4px;
            animation: slideIn 0.5s ease-in-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="brand-title">PF <span style="color: red;">GYM</span> & FITNESS</div>
        <!-- Link Navigation Buttonx -->
        <a href="<?php echo base_url("profile")?>" class="user-button">
            <span class="username">ADMIN</span>
            <div class="profile-icon"><i class="fas fa-user"></i></div>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="menu-title">Menu</div>
            <a href="#dashboard" class="menu-item active" onclick="showContent('dashboard')">
                <div class="icon-box"><i class="fas fa-chart-line"></i></div> 
                Dashboard
            </a>
            <a href="#data-member" class="menu-item" onclick="showContent('data-member')">
                <div class="icon-box"><i class="fas fa-user"></i></div>
                Data Member
            </a>
            <a href="#manage-membership" class="menu-item" onclick="showContent('manage-membership')">
                <div class="icon-box"><i class="fas fa-file-alt"></i></div> 
                Manage Membership
            </a>
            <a href="#attendance-member" class="menu-item" onclick="showContent('attendance-member')">
                <div class="icon-box"><i class="fas fa-calendar-check"></i></div>
                Attendance Member
            </a>
            <!-- Menambahkan Menu Report Member -->
            <a href="#report-member" class="menu-item" onclick="showContent('report-member')">
                <div class="icon-box"><i class="fas fa-chart-pie"></i></div> 
                Report Member
            </a>
        </div>
        <button class="logout-button">
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

        <!-- BAGIAN ZAXXI -->
        <div id="dashboard" class="menu-content active">
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.5em; color: black;">Dashboard</h1>
            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 100; font-size: 1em; color: black;">Laporan Bulanan</h3>
            
            <div class="dashboard-stats">
                <div class="dashboard-card">
                    <h4>Member Baru</h4>
                    <div class="number"><?= $baru ?></div>
                </div>
                <div class="dashboard-card">
                    <h4>Member Aktif</h4>
                    <div class="number"><?= $aktif ?></div>
                </div>
                <div class="dashboard-card">
                    <h4>Tidak Aktif</h4>
                    <div class="number"><?= $tidak ?></div>
                </div>
                <div class="dashboard-card">
                    <h4>Total Member</h4>
                    <div class="number"><?=$totalMember ?></div>
                </div>
            </div>

            <div class="member-info-section">
                <h3 style="font-family: 'Poppins', sans-serif; font-weight: 100; font-size: 1em; color: black;">Informasi Member</h3>
                
                <table class="member-info-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Member</th>
                            <th>Username</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Phone Number</th>
                            <th>Tanggal Habis</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        <?php foreach($member as $m):?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $m['id_member']?></td>
                                <td><?= $m['nama_member']?></td>
                                <td><?= $m['jenis_kelamin']?></td>
                                <td><?= $m['agama']?></td>
                                <td><?= $m['nomor_hp']?></td>
                                <td><?= $m['tanggal_akhir']?></td>
                                <td><span class="status-badge <?= $m['status']?>"><?= $m['status']?></span></td>
                            </tr>
                            <?php  $i++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?= $pager->links('member', 'default_pager') ?>
            </div>
        </div>
        
        <!-- OTW ABANGKUHH -->
        <div id="data-member" class="menu-content">
            <h2>Data Member</h2>
        </div>
        
        <!-- BAGIAN ZAXXI -->
        <div id="manage-membership" class="menu-content">
            <h2>Manage Membership</h2>
        </div>
        
        <!-- HALAMAN ATTANDANCE -->
        <div id="attendance-member" class="menu-content">
            
            <!-- JUDUL -->
            <h2 style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.5em; color: black;">Attendance Member</h2>

            <!-- Search Box -->
            <div style="margin-bottom: 20px; text-align: center;">
                <form method="get" action="<?= base_url('dashboard') ?>" style="display: inline;">
                    <input type="text" name="search" id="search-bar" placeholder="Cari berdasarkan nama, email, atau nomor HP"
                        value="<?= esc($search) ?>" 
                        style="width: 80%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                    <button type="submit"
                        style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; font-size: 1em; cursor: pointer;">
                        Cari
                    </button>
                </form>
            </div>

           <!-- Tabel Informasi Member -->
            <div class="member-info-section">
                <h3 style="font-family: 'Poppins', sans-serif; font-weight: 100; font-size: 1em; color: black;">Daftar Kehadiran Member</h3>

                <table class="member-info-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Phone Number</th>
                            <th>Agama</th>
                            <th>Tanggal Akhir</th>
                            <th>Status</th>
                            <th>Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + ($pager->getCurrentPage('member') - 1) * $pager->getPerPage('member'); ?>
                        <?php foreach($member as $m): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $m['nama_member'] ?></td>
                                <td><?= $m['nomor_hp'] ?></td>
                                <td><?= $m['agama'] ?></td>
                                <td><?= $m['tanggal_akhir'] ?></td>
                                <td><span class="status-badge <?= strtolower($m['status']) ?>"><?= ucfirst($m['status']) ?></span></td>
                                <td>
                                    <form action="<?= base_url('dashboard/hadir/'.$m['id_member']) ?>" method="post">
                                        <button type="submit" 
                                        style="padding: 5px 10px; border: none; border-radius: 5px; background-color: #007BFF; 
                                            color: white; cursor: pointer; font-family: 'Poppins', sans-serif; font-weight: 500;">
                                            Check In
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('member', 'default_pager', ['page' => 'attendance-member']) ?>
            </div>
        </div>

        <!-- HALAMAN REPORT MEMBER -->
        <div id="report-member" class="menu-content">
            <h2 style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.5em; color: black;">Report Member</h2>

            <table class="member-info-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kehadiran as $k): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $k['id_member'] ?></td>
                            <td><?= $k['tanggal'] ?></td>
                            <td><?= $k['waktu'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    <script>
        function showContent(menuId) {
            // Hide all menu contents
            var contents = document.querySelectorAll('.menu-content');
            contents.forEach(function(content) {
                content.classList.remove('active');
            });

            // Show the clicked menu's content
            document.getElementById(menuId).classList.add('active');

            // Update active class on sidebar menu items
            var menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(function(item) {
                item.classList.remove('active');
            });

            var activeItem = document.querySelector('a[href="#' + menuId + '"]');
            if (activeItem) {
                activeItem.classList.add('active');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Auto-hide alerts after 3 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    alert.style.transition = 'opacity 0.5s ease-in-out';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 3000);
            });
        });

        // Fungsi Untuk Pencarian// AJAX JS
        document.getElementById("search-bar").addEventListener("input", function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll(".member-info-table tbody tr");

        rows.forEach(row => {
            const name = row.cells[1].textContent.toLowerCase();
            const phone = row.cells[2].textContent.toLowerCase();
            const email = row.cells[3] ? row.cells[3].textContent.toLowerCase() : "";

            if (name.includes(searchValue) || phone.includes(searchValue) || email.includes(searchValue)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
    </script>
</body>
</html>

