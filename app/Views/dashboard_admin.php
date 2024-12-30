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
                    <?php foreach ($kedatangan as $k): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $k['nama_member'] ?></td>
                            <td><?= $k['tanggal_datang'] ?></td>
                            <td><?= $k['waktu'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
</body>
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
</html>

