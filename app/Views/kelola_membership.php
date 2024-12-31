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

        .navbar .search-box {
            width: 600px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .navbar .search-box input {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: white;
            font-size: 1em;
            outline: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
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

        /* MEMBERSHIP SECTION */
        .membership {
            background-color: #9197B3;
            padding: 50px 10%;
            text-align: center;
        }

        .membership-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 2.5em;
            color: white;
            margin-bottom: 40px;
        }

        .membership-cards {
            display: flex;
            gap: 50px; 
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .membership-card {
            background-color: #9197B3;
            color: white;
            width: 200px;
            height: 300px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            transition: transform 0.3s ease;
        }
        .membership-card2 {
            color: white;
            width: 200px;
            height: 300px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            transition: transform 0.3s ease;
            border: 2px  #9197B3;
            border-style: dotted;
            text-decoration: none;
        }

        .membership-card h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 400;
            font-size: 1,5em;
            margin-bottom: 20px;
        }

        .membership-card p {
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 100;
            font-size: 1em;
            margin-bottom: 20px;
            text-align: center; 
            color:rgb(79, 79, 79);
        }

        .membership-card ul {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .membership-card ul li{
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 100;
            font-size: 1em;
            margin-bottom: 10px;
        }

        .join-button {
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 100;
            font-size: 1em;
            padding: 5px 10px;
            background-color: #F97C7C;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 10px;
        }

        .join-button:hover {
            background-color: #d10000;
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
        <div class="member-info-section">
            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 100; font-size: 1em; color: black;">Informasi Membership</h3>
            <div class="membership-cards">
                    <!-- Card 1 -->
                <?php foreach($membership as $m): ?>
                    <div class="card-box" style="display: flex; flex-direction: column; align-items:center; gap:10px;">
                        <div class="membership-card">
                            <h3><?=$m['durasi']?> Days</h3>
                            <p><?=$m['jenis_membership']?></p>
                            <?php $fasilitas = explode(',', $m['fasilitas']);?>
                            <ul>
                                <?php foreach($fasilitas as $f): ?>
                                    <li><?=trim($f);?></li>
                                <?php endforeach ?>
                            </ul>
                            <button class="join-button">Rp <?=number_format($m['harga'], 0, ',', '.')?></button>
                        </div>
                        <a href="/dashboard/delete/<?=$m['id_membership']?>"><i class="fa-solid fa-xmark" style="background-color: #F97C7C; padding: 5px; width: 30px; border-radius: 50px; text-align:center; font-size:20px; color:white;"></i></a>
                    </div>
                <?php endforeach ?>

                <div class="card-box">
                    <a href="<?php echo base_url('dashboard/membership/formAdd')?>" class="membership-card2">
                        <i class="fa-solid fa-plus" style="background-color: #9197B3; padding: 5px; width: 30px; border-radius: 50px; text-align:center; font-size:20px; color:white;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
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
    </script>
</body>
</html>

