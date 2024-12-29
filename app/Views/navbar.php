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

    <!-- Library Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* body {
            width: 100%;
            margin: auto;
        } */
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
    </style>
</head>

<nav>
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
