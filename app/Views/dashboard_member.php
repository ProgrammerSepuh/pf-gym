<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
            background-color: #44DF5B;
            color: white;
            padding: 15px;
            font-size: 2em;
            font-family: 'Bebas Neue', sans-serif;
            text-align: center;
            width: 200px;
            margin: 0 auto; 
            font-weight: 600;
        }

        /* Days left styling */
        .status-days {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 3em;
            color: #44DF5B;
            text-align: center;
            font-weight: 600;
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
        <div class="user-button">
            <span class="username">Donny Abraham</span>
            <div class="profile-icon"><i class="fas fa-user"></i></div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="menu-title">Menu</div>
            <a href="<?php echo base_url('/member'); ?>" class="menu-item active">
            <div class="icon-box"><i class="fas fa-chart-line"></i></div> 
            Dashboard
        </a>
        </div>
        <button class="logout-button">
            <div class="icon-circle"><i class="fas fa-arrow-left"></i></div>
            Logout
        </button>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome, Donny Abraham</h1>
        <div class="profile-box">
            
            <div class="profile-header">
                <div class="profile-details">
                    <div class="profile-photo">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <div class="username">Donny Abraham</div>
                        <div class="email">donny@example.com</div>
                    </div>
                    <a href="<?php echo base_url('#'); ?>" class="edit-btn">Edit</a>
                </div>
            </div>
            
            <div class="profile-forms">
                <div style="display: flex; gap: 20px;">
                    <div style="flex: 1;">
                        <label for="full-name" style="display: block; margin-bottom: 5px;">Full Name</label>
                        <input type="text" id="full-name" placeholder="Enter your full name" style="width: 100%; padding: 10px; border: none; border-radius: 5px; background-color: #e0e0e0; outline: none;">
                    </div>
                    <div style="flex: 1;">
                        <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
                        <input type="email" id="email" placeholder="Enter your email" style="width: 100%; padding: 10px; border: none; border-radius: 5px; background-color: #e0e0e0; outline: none;">
                    </div>
                </div>
                <div style="display: flex; gap: 20px; margin-top: 15px;">
                    <div style="flex: 1;">
                        <label for="phone-number" style="display: block; margin-bottom: 5px;">Phone Number</label>
                        <input type="text" id="phone-number" placeholder="Enter your phone number" style="width: 100%; padding: 10px; border: none; border-radius: 5px; background-color: #e0e0e0; outline: none;">
                    </div>
                    <div style="flex: 1;">
                        <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
                        <input type="password" id="password" placeholder="Enter your password" style="width: 100%; padding: 10px; border: none; border-radius: 5px; background-color: #e0e0e0; outline: none;">
                    </div>
                </div>
            </div>
        </div>

        <div class="status-container">
            <div class="status-box">
                <div class="status-title">Member Status</div>
                <div class="status-active-box">Active</div>
            </div>
            <div class="status-box">
                <div class="status-title">Day Left:</div>
                <div id="sisaHari" class="status-days">31 Days</div>
            </div>
        </div>

    </div>
</body>
</html>
