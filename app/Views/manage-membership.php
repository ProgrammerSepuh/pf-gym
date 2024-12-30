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

        <!-- Manage Membership -->
        <div id="manage-membership" class="menu-content">
            <h2>Manage Membership</h2>
        </div>
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
