<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <!-- CSS Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Library Tambahan -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Icon Website -->
    <link rel="icon" href="<?php echo base_url('assets/Logo_PF-Gym.png')?>" />

    <!-- Library Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* First, modify the existing nav CSS */
        nav {
            position: fixed; 
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 10%;
            background-color: #FF0000; 
            color: white;
            z-index: 10; 
        }

        .logo {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-size: 1.5em;
            color: white; 
            background-color: #628CE2; 
            padding: 5px 20px; 
            border: none; 
            border-radius: 3px; 
            cursor: pointer; 
            text-align: center; 
            text-decoration: none; 
            transition: transform 0.2s; 
        }

        .logo:hover {
            background-color: #4a6fa1; 
            transform: translateY(-3px); 
        }

        .bar {
            display: flex;
            gap: 20px;
        }

        .bar h4 {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-size: 1.5em;
            transition: color 0.3s ease;
            cursor: pointer;
        }

        .bar h4:hover {
            color: #f39c12; 
        }

        /* Add hamburger menu icon */
        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.5em;
        }

        /* Add responsive styles */
        @media screen and (max-width: 768px) {
            nav {
                padding: 15px 5%;
            }

            .menu-toggle {
                display: block;
                order: 1;
            }

            .bar {
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: #FF0000;
                flex-direction: column;
                align-items: center;
                padding: 20px 0;
                gap: 15px;
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .bar.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            .logo {
                order: 2;
                margin-left: auto;
                font-size: 1.2em;
                padding: 5px 15px;
            }
        }

        @media screen and (max-width: 480px) {
            nav {
                padding: 10px 5%;
            }

            .logo {
                font-size: 1em;
                padding: 5px 10px;
            }

            .bar h4 {
                font-size: 1.2em;
            }
        }
    </style>
</head>

<nav>
    <div class="menu-toggle">
        <i class="fas fa-bars"></i>
    </div>
    
    <div class="bar">
        <h4 data-scroll="#home">HOME</h4>
        <h4 data-scroll="#about">ABOUT</h4>
        <h4 data-scroll="#service">SERVICE</h4>
        <h4 data-scroll="#member">MEMBERSHIP</h4>
    </div>

    <div class="logo">
        <a href="<?php echo base_url("auth")?>">BERGABUNG!</a>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const bar = document.querySelector('.bar');

    menuToggle.addEventListener('click', function() {
        bar.classList.toggle('active');
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.menu-toggle') && !event.target.closest('.bar')) {
            bar.classList.remove('active');
        }
    });

    // Close menu when clicking on a link
    const menuItems = document.querySelectorAll('.bar h4');
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            bar.classList.remove('active');
        });
    });
});
</script>