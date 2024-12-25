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

        .status-active {
            background-color: #28a745;
            color: white;
        }

        .status-inactive {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="brand-title">PF <span style="color: red;">GYM</span> & FITNESS</div>
        <div class="search-box">
            <input type="text" placeholder="Search">
        </div>
        <!-- Link Navigation Buttonx -->
        <a href="<?php echo base_url("profile")?>" class="user-button">

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
        </div>
        <button class="logout-button">
            <div class="icon-circle"><i class="fas fa-arrow-left"></i></div>
            Logout
        </button>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div id="dashboard" class="menu-content active">
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.5em; color: black;">Dashboard</h1>
            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 100; font-size: 1em; color: black;">Laporan Bulanan</h3>
            
            <div class="dashboard-stats">
                <div class="dashboard-card">
                    <h4>Member Baru</h4>
                    <div class="number">10</div>
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
                        <tr>
                            <td>1</td>
                            <td>MB001</td>
                            <td>John Doe</td>
                            <td>Laki-laki</td>
                            <td>Islam</td>
                            <td>081234567890</td>
                            <td>2024-12-31</td>
                            <td><span class="status-badge status-active">Active</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>MB002</td>
                            <td>Jane Smith</td>
                            <td>Perempuan</td>
                            <td>Kristen</td>
                            <td>087654321098</td>
                            <td>2024-06-30</td>
                            <td><span class="status-badge status-inactive">Active</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>MB003</td>
                            <td>Michael Johnson</td>
                            <td>Laki-laki</td>
                            <td>Katholik</td>
                            <td>085678901234</td>
                            <td>2024-09-15</td>
                            <td><span class="status-badge status-active">Active</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="data-member" class="menu-content">
            <h2>Data Member</h2>
        </div>
        <div id="manage-membership" class="menu-content">
            <h2>Manage Membership</h2>
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
