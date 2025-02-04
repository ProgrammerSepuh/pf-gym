<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="<?php echo base_url('assets/Logo_PF-Gym.png')?>" />
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
            background-color: #f0f0f0;
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
            color: gray;
        }

        /* Logout Button */
        .logout-button {
            width: 100%;
            padding: 10px 15px;
            text-align: left;
            border-radius: 5px;
            border: none;
            font-size: 0.9em;
            font-weight: 500;
            color: white;
            background-color: #d9534f;
            cursor: pointer;
            margin-top: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #c9302c;
        }

        /* Main Content */
        .content {
            margin-left: 370px;
            padding: 30px;
            flex-grow: 1;
            margin-top: 85px;
        }

        .content .profile-box {
            background-color: white;
            padding: 50px;
            padding-left: 150px;
            padding-right: 150px;
            border-radius: 10px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }

        /* Profile Header */
        .profile-box .profile-header {
            margin-bottom: 30px;
        }

        .profile-box .profile-header h1 {
            font-size: 1.5em;
            font-weight: 600;
            color: black;
        }

        .profile-box .profile-header .profile-details {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 20px;
            margin-top: 10px;
        }

        .profile-box .profile-header .profile-details .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: gray;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 2em;
        }

        .profile-box .profile-header .profile-details .username {
            font-size: 1.2em;
            font-weight: 600;
            color: black;
            margin-top: 5px;
        }

        .profile-box .profile-header .profile-details .email {
            font-size: 1em;
            color: gray;
        }

        /* Edit Button */
        .profile-box .profile-header .edit-btn {
            background-color: #007BFF;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            border: none;
            transition: background-color 0.3s;
            margin-left: auto;
        }

        .profile-box .profile-header .edit-btn:hover {
            background-color: #0056b3;
        }

        .content h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .sidebar .menu-item.active {
            background-color: #007BFF;
            color: white;
        }

        .sidebar .menu-item.active .icon-box {
            background-color: white;
            color: #007BFF;
        }

        /* Container untuk status */
        .status-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        /* Box untuk masing-masing status */
        .status-box {
            flex: 1;
            background-color: white;
            padding: 30px;
            margin: 0 15px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }

        /* Judul status */
        .status-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1em;
            font-weight: 500;
            color: gray;
            margin-bottom: 20px;
        }

        /* Box untuk status active */
        .status-active-box {
            color: white;
            padding: 15px;
            font-size: 2em;
            font-family: 'Bebas Neue', sans-serif;
            text-align: center;
            width: 200px;
            margin: 0 auto; 
            font-weight: 400;
        }

        /* Days left styling */
        .status-days {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 3em;
            color: #44DF5B;
            text-align: center;
            font-weight: 4v00;
        }

        .status-green {
            background-color: #00FF00;
        }

        .status-red {
            background-color: #FF0000;
        }

        /* Edit Button */
    .edit-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Modal (Hidden by default) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
        padding-top: 60px;
    }

    /* Modal Content */
    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 5px;
    }

    /* Close Button */
    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Form Inputs */
    input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }

    .submit-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    /* Box untuk logout button */
    .logout-box {
        background-color: white;
        padding: 50px;
        padding-left: 150px;
        padding-right: 150px;
        border-radius: 10px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    /* Styling logout button */
    .mobile-logout-button {
        font-size: 1.2em;
        font-weight: 600;
        color: #d9534f;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: color 0.3s;
    }

    .mobile-logout-button i {
        font-size: 1.5em;
    }

    .mobile-logout-button:hover {
        color: #c9302c;
    }

    /* Add these media queries at the end of your existing CSS */

    @media screen and (max-width: 768px) {
        /* Hide sidebar on mobile */
        .sidebar {
            display: none;
        }

        /* Adjust content margin for mobile */
        .content {
            margin-left: 0;
            padding: 15px;
            margin-top: 70px;
        }

        /* Adjust profile box padding */
        .content .profile-box {
            padding: 20px;
            padding-left: 20px;
            padding-right: 20px;
        }

        /* Make status container stack vertically */
        .status-container {
            flex-direction: column;
        }

        .status-box {
            margin: 10px 0;
        }

        /* Adjust profile forms for mobile */
        .profile-forms > div {
            flex-direction: column !important;
            gap: 10px !important;
        }

        /* Adjust navbar for mobile */
        .navbar {
            padding: 10px 15px;
        }

        .navbar .brand-title {
            font-size: 1.5em;
        }

        .navbar .user-button {
            padding: 5px 10px;
        }

        .navbar .user-button .username {
            display: none;
        }

        /* Adjust modal content for mobile */
        .modal-content {
            width: 95%;
            margin: 20px auto;
        }

        /* Adjust profile details layout */
        .profile-box .profile-header .profile-details {
            flex-direction: column;
            text-align: center;
        }

        .profile-box .profile-header .profile-details .profile-photo {
            margin: 0 auto;
        }

        .edit-btn {
            margin: 10px auto 0;
        }
    }

    /* Additional adjustments for very small screens */
    @media screen and (max-width: 480px) {
        .navbar .brand-title {
            font-size: 1.2em;
        }

        .content h1 {
            font-size: 1.2em;
        }

        .status-active-box {
            width: 100%;
        }
    }

    @media screen and (min-width: 768px) {
        .logout-box {
            display: none;
        }
    }

    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
    <div class="brand-title">
        <a href="<?= base_url('/'); ?>" style="text-decoration: none; color: inherit;">
            PF <span style="color: red;">GYM</span> & FITNESS
        </a>
    </div>


    <!-- Menampilkan data member yang login -->
    <div class="user-button">
        <span class="username"><?= esc($member['nama_member']); ?></span>
        <div class="profile-icon"><i class="fas fa-user"></i></div>
    </div>
        
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="menu-title">Menu</div>
            <a href="<?= base_url('/member'); ?>" class="menu-item active">
                <div class="icon-box"><i class="fas fa-chart-line"></i></div> 
                Dashboard
            </a>
        </div>
        <a href="<?= base_url('/logout'); ?>" class="logout-button">
            <div class="icon-circle"><i class="fas fa-arrow-left"></i></div>
            Logout
        </a>
    </div>


    <!-- Main Content -->
    <div class="content">
        <!-- Menampilkan pesan selamat datang dengan nama member -->
        <h1>Welcome, <?= esc($member['nama_member']); ?></h1>
        <div class="profile-box">
            
            <div class="profile-header">
                <div class="profile-details">
                    <div class="profile-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <div class="username"><?= esc($member['nama_member']); ?></div>
                        <div class="email"><?= esc($member['email']); ?></div>
                    </div>

                    <!-- Edit Button -->
                    <a class="edit-btn" id="openEditModal">Edit</a>

                    <!-- Modal Popup -->
                    <div id="editModal" class="modal">
                        <div class="modal-content">
                            <span class="close-btn" id="closeEditModal">&times;</span>
                            <h3>Edit Profile</h3>
                            <form action="<?= base_url('memberDashboard/updateProfile'); ?>" method="POST">
                                <label for="full-name">Full Name</label>
                                <input type="text" id="full-name" name="full_name" value="<?= esc($member['nama_member']); ?>" required>

                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="<?= esc($member['email']); ?>" required>

                                <label for="phone-number">Phone Number</label>
                                <input type="text" id="phone-number" name="phone_number" value="<?= esc($member['nomor_hp']); ?>" required>

                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" value="<?= esc($member['password']); ?>" required>

                                <button type="submit" class="submit-btn">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="profile-forms">
                <div style="display: flex; gap: 20px;">
                    <div style="flex: 1;">
                        <label for="full-name" style="display: block; margin-bottom: 5px;">Full Name</label>
                        <div id="full-name" style="width: 100%; padding: 10px; background-color: #e0e0e0; border-radius: 5px;">
                            <?= esc($member['nama_member']); ?>
                        </div>
                    </div>
                    <div style="flex: 1;">
                        <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
                        <div id="email" style="width: 100%; padding: 10px; background-color: #e0e0e0; border-radius: 5px;">
                            <?= esc($member['email']); ?>
                        </div>
                    </div>
                </div>
                <div style="display: flex; gap: 20px; margin-top: 15px;">
                    <div style="flex: 1;">
                        <label for="nomor_hp" style="display: block; margin-bottom: 5px;">Phone Number</label>
                        <div id="nomor_hp" style="width: 100%; padding: 10px; background-color: #e0e0e0; border-radius: 5px;">
                            <?= esc($member['nomor_hp']); ?>
                        </div>
                    </div>
                    <div style="flex: 1;">
                        <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
                        <div id="password" style="width: 100%; padding: 10px; background-color: #e0e0e0; border-radius: 5px;">
                            ********
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="status-container">
            <div class="status-box">
                <div class="status-title">Member Status</div>
                <div class="status-active-box <?= ($member['status'] === 'Active') ? 'status-green' : 'status-red '; ?>">
                    <?= esc($member['status']); ?>
                </div>
            </div>


            <!-- Menampilkan sisa hari menggunakan fungsi PHP -->
            <?php
            $sisaHari = 0;
            if (!empty($member['tanggal_akhir'])) {
                $tanggalAkhir = new DateTime($member['tanggal_akhir']);
                $today = new DateTime();
                $interval = $today->diff($tanggalAkhir);
                $sisaHari = $interval->days;
            }
            ?>
            <div class="status-box">
                <div class="status-title">Day Left:</div>
                <div id="sisaHari" class="status-days"
                    style="color: 
                        <?= ($member['sisa_hari'] == 0) ? '#FF0000' : 
                            (($member['sisa_hari'] >= 1 && $member['sisa_hari'] <= 5) ? '#FFFF00' : '#00FF00'); ?>;">
                    <?= esc($member['sisa_hari']); ?> Days
                </div>
            </div>
        </div>

        <div class="profile-box logout-box">
            <a href="<?= base_url('/logout'); ?>" class="logout-button">
            <div class="icon-circle"><i class="fas fa-arrow-left"></i></div>
            Logout
        </a>
        </div>

    </div>
</body>

</html>

<script>
    // Get modal and buttons
    var modal = document.getElementById('editModal');
    var openBtn = document.getElementById('openEditModal');
    var closeBtn = document.getElementById('closeEditModal');

    // Open modal when Edit button is clicked
    openBtn.onclick = function() {
        modal.style.display = "block";
    }

    // Close modal when X button is clicked
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Close modal if clicked outside of the modal content
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>