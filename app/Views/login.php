<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #1c1c1c;
            padding: 15px 30px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            border-bottom: 2px solid #FF0000;
        }

        .navbar a {
            text-decoration: none;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.8em;
            color: white;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #FF0000;
        }

        .login-container {
            display: flex;
            max-width: 1100px;
            width: 100%;
            height: 600px;
            border: 2px solid #262626;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            width: 150%;
            height: 150%;
            background-color: #1c1c1c;
            transform: translate(-50%, -50%) rotate(-45deg);
            z-index: 1;
        }

        .login-left {
            flex: 1;
            position: relative;
            background-image: url('<?php echo base_url("assets/login-page.jpg"); ?>');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2; 
        }

        .login-left::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.4);
            z-index: 1;
        }

        .login-left img {
            position: relative;
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
            z-index: 2;
        }

        .login-right {
            flex: 1;
            background-color: transparent;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2;
        }

        .login-right form {
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        .login-right h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.5em;
            color: #FF0000;
            margin-bottom: 20px;
        }

        .login-right p {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #FF0000;
            border-radius: 5px;
            background-color: #121212;
            color: white;
        }

        .form-group input:focus {
            outline: none;
            border-color: white;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #FF0000;
            color: white;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #d10000;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 768px) {
            body {
                padding: 20px;
                padding-top: 80px;
            }

            .navbar {
                padding: 10px 20px;
                position: fixed;
                z-index: 1000;
            }

            .navbar a {
                font-size: 1.5em;
            }

            .login-container {
                flex-direction: column;
                height: auto;
                min-height: unset;
                margin-top: 20px;
            }

            .login-container::before {
                display: none;
            }

            .login-left {
                display: none;
            }

            .login-right {
                padding: 20px;
            }

            .login-right form {
                max-width: 100%;
            }

            .login-right h1 {
                font-size: 2em;
            }

            .form-group input {
                padding: 12px;
                font-size: 16px;
            }

            .login-button {
                padding: 12px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
                padding-top: 70px;
            }

            .navbar {
                padding: 8px 15px;
            }

            .navbar a {
                font-size: 1.3em;
            }

            .login-right {
                padding: 15px;
            }

            .login-right h1 {
                font-size: 1.8em;
            }

            .login-right p {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="<?php echo base_url("/")?>">PF GYM & FITNESS</a>
    </nav>

    <div class="login-container">
        <!-- Bagian Kiri -->
        <div class="login-left">
            <img src="<?php echo base_url('assets/logos.png'); ?>" alt="Logo">
        </div>

        <!-- Bagian Kanan -->
        <div class="login-right">
            <!-- Form Login -->
            <form action="<?php base_url('loginProses')?>" method="POST">
                <h1>Login</h1>
                <?php if (session()->getFlashdata('pesan')): ?>
                    <div style="color: red; text-align: center;">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <p>Masukkan username dan password untuk login</p>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="usernameOrEmail" placeholder="Username atau Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button class="login-button">Login</button>
            </form>
        </div>
    </div>
</body>
</html>