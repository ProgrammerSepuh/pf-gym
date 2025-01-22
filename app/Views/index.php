<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fjalla+One&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* CLASS JUDUL */
        .judul {
            position: relative;
            display: flex;
            height: 100vh;
            background-image: url(<?php echo base_url("assets/homepage-image.jpg")?>);
            background-size: cover;
            background-position: center; 
            justify-content: flex-start;
            align-items: center;
            padding: 0 10%;
        }

        .judul-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .judul-text {
            position: relative;
            z-index: 2;
            color: white;
            text-align: left;
        }

        .judul-text h2 {
            font-size: 4em;
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .judul-text h1 {
            font-size: 5em; 
            font-family: 'Fjalla One', sans-serif;
            font-weight: 600;
            margin-bottom: 30px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .judul-subtext {
            font-size: 2em; 
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            margin-bottom: 40px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .join-button {
            font-size: 1.5em; 
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            padding: 15px 30px; 
            color: red;
            background-color: transparent;
            border: 3px solid red; 
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s, color 0.3s;
        }

        .join-button:hover {
            background-color: red;
            color: white;
        }
        
        /* DIV ABOUT */
        .about {
            background-color: #121212;
            padding: 50px 10%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .about-content {
            text-align: center;
            max-width: 800px;
        }

        .about-title {
            font-size: 3em;
            font-family: 'Bebas Neue', sans-serif;
            margin-bottom: 20px;
        }

        .about-content p {
            font-size: 1.2em;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            color: white;
            margin-bottom: 10px;
            line-height: 1.6;
            text-align: center; 
        }

        .boxes {
            display: flex;
            justify-content: center; 
            gap: 30px;
            flex-wrap: wrap; 
            margin-top: 40px;
            width: 100%;
        }

        .box {
            background-color: transparent;
            border: 2px solid red;
            padding: 20px;
            width: 650px; 
            height: 270px; 
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            transition: transform 0.3s ease;
            box-sizing: border-box;
        }

        .box:hover {
            transform: translateY(-5px);
        }

        .box h3 {
            font-size: 2em; 
            color: white;
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .box h4 {
            font-size: 1.5em; 
            color: #FF0000;
            font-family: 'Bebas Neue', sans-serif; 
            font-weight: 400;
            margin-bottom: 15px;
        }

        .box p {
            font-size: 1.2em; 
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            color: white;
            line-height: 1.6;
        }
    
        /* DIV SERVICE */
        .service {
            position: relative;
            display: flex;
            height: 100vh;
            background-image: url(<?php echo base_url("assets/homepage-image(2).png")?>);
            background-size: cover;
            background-position: center;
            justify-content: flex-start;
            align-items: center;
            padding: 0;
        }

        .service-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            z-index: 1;
        }

        .service-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10%;
            width: 100%;
            height: 100%;
        }

        .service-left {
            width: 50%;
            color: white;
        }

        .service-left h2 {
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 400;
            font-size: 4.5em; 
            line-height: 1.2;
        }

        .service-left h2 span {
            display: block;
        }

        .service-left p {
            font-family: 'Poppins', sans-serif;
            font-weight: 200;
            font-size: 1em; 
            margin-top: 20px;
            color: white;
            line-height: 1.5; 
        }

        .service-right {
            width: 30%; 
            position: relative; 
        }

        .service-right img {
            width: 90%; 
            height: auto;
            border-radius: 0; 
            width: 100%; 
            height: auto;
        }

        .service-right::before {
            content: "";
            position: absolute;
            top: -60px;
            left: -60px; 
            width: calc(100% + 15px);
            height: calc(100% + 15px); 
            border: 3px solid red; 
            pointer-events: none; 
            opacity: 0.5; 
            box-sizing: border-box;
            z-index: -1; 
        }

        .service-right::after {
            content: "";
            position: absolute;
            top: 40px; 
            left: 40px; 
            width: calc(100% + 30px); 
            height: calc(100% + 30px); 
            border: 3px solid white; 
            pointer-events: none; 
            opacity: 0.5; 
            box-sizing: border-box;
            z-index: -2;
        }

        /* MEMBERSHIP SECTION */
        .membership {
            background-color: #121212;
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
            justify-content: center;
            gap: 50px; 
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .membership-card {
            background-color: #1c1c1c;
            color: white;
            padding: 30px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            transition: transform 0.3s ease;
        }

        .membership-card h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 400;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .membership-card p {
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 100;
            font-size: 1.7em;
            margin-bottom: 20px;
            text-align: center; 
            color: #FF0000;
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
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .join-button {
            font-family: 'Bebas Neue', sans-serif;
            font-weight: 100;
            font-size: 1.2em;
            padding: 10px 25px;
            background-color: red;
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

        /* MEDIA QUERIES FOR RESPONSIVENESS */
        @media (max-width: 768px) {
            .judul {
                padding: 0 5%;
                flex-direction: column;
                justify-content: center;
                height: auto;
            }

            .judul-text h2 {
                font-size: 2.5em;
            }

            .judul-text h1 {
                font-size: 3.5em;
            }

            .judul-subtext {
                font-size: 1.5em;
            }

            .about {
                padding: 30px 5%;
            }

            .about-title {
                font-size: 2.5em;
            }

            .about-content p {
                font-size: 1.1em;
            }

            .boxes {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .box {
                width: 90%;
                height: auto;
                padding: 15px;
            }

            .service {
                height: auto;
                padding: 30px 5%;
            }

            .service-left h2 {
                font-size: 3.5em;
            }

            .service-left p {
                font-size: 1.1em;
            }

            .service-right {
                width: 100%;
                margin-top: 20px;
            }

            .service-right img {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
    .service-content {
        flex-direction: column;
        padding: 20px 5%;
    }

    .service-left {
        width: 100%;
        text-align: center;
        margin-bottom: 30px;
    }

    .service-right {
        width: 100%;
        margin-top: 20px;
    }

    .service-left p {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 4.5em;
        position: relative;
    }

    .service-left p::after {
        content: "...";
        position: absolute;
        right: 0;
        bottom: 0;
        padding-left: 40px;
        background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.85) 50%);
    }

    .service {
        min-height: 100vh;
        height: auto;
    }

    .service-right::before,
    .service-right::after {
        display: none;
    }

    .service-left h2 {
        font-size: 2.5em;
        margin-bottom: 15px;
    }

    .service-right img {
        max-width: 100%;
        height: auto;
        margin: 0 auto;
        display: block;
    }
}

@media (max-width: 480px) {
    .service-left h2 {
        font-size: 2em;
    }

    .service-left p {
        font-size: 0.9em;
        -webkit-line-clamp: 4;
        max-height: 6em;
    }
}

@media (max-width: 768px) {
    .judul {
        padding: 100px 5% 50px;
        min-height: 100vh;
        height: auto;
    }

    .judul-text {
        padding-top: 40px;
    }

    .judul-text h2 {
        font-size: 2.5em;
    }

    .judul-text h1 {
        font-size: 3.5em;
    }

    .judul-subtext {
        font-size: 1.5em;
    }

    /* Ensure proper spacing from top with fixed navbar if present */
    body {
        padding-top: env(safe-area-inset-top, 0px);
    }
}

@media (max-width: 480px) {
    .judul {
        padding: 80px 5% 40px;
    }
    
    .judul-text {
        padding-top: 30px;
    }

    .judul-text h2 {
        font-size: 2em;
    }

    .judul-text h1 {
        font-size: 3em;
    }

    .judul-subtext {
        font-size: 1.2em;
    }
}

    </style>
</head>
<body>

<div class="judul" id="home">
    <div class="judul-overlay"></div>
    <div class="judul-text">
        <h2>PF GYM & FITNESS</h2>
        <h1>BE STRONG</h1>
        <p class="judul-subtext">READY TO TRAIN YOUR BODY</p>
        
        <a href="<?php echo base_url("auth")?>">
            <button class="join-button">LET'S JOIN US</button>
        </a>
        
    </div>
</div>

<!-- DIV ABOUT -->
<div class="about" id="about">
    <div class="about-content">
        <h2 class="about-title">
            <span style="color: white; font-weight: 400;">KENAPA</span> 
            <span style="color: #FF0000; font-weight: 400;">MEMILIH KAMI</span>
        </h2>
        <p>
            Kami menawarkan pengalaman yang baik untuk Anda. Kami juga menyediakan ebook panduan manual 
            untuk Anda yang baru join.
        </p>
    </div>
    
    <div class="boxes">
        <div class="box">
            <h3>01</h3>
            <h4>STAF TRAINING</h4>
            <p>Kami memiliki staf training yang dapat membantu Anda dalam pelatihan di GYM dan mencapai tujuan Anda.</p>
        </div>
        <div class="box">
            <h3>02</h3>
            <h4>E-BOOK PANDUAN</h4>
            <p>Kami memberikan EBOOK untuk panduan pada member baru.</p>
        </div>
    </div>

    <div class="boxes">
        <div class="box">
            <h3>03</h3>
            <h4>STAF RESPONSIF</h4>
            <p>Kami memiliki staf yang selalu online untuk membantu Anda.</p>
        </div>
        <div class="box">
            <h3>04</h3>
            <h4>FASILITAS YANG MEMADAI</h4>
            <p>Kami memiliki fasilitas yang cukup lengkap untuk membantu latihan Anda.</p>
        </div>
    </div>
</div>

<!-- SERVICE DIV -->
<div class="service" id="service">
    <div class="service-overlay"></div>
    <div class="service-content">
        <!-- Bagian Kiri -->
        <div class="service-left">
            <h2>
                <span style="color: #FF0000;">
                    KAMI PUNYA BANYAK
                </span>
                PENGALAMAN
            </h2>
            <p>
                Siap jadi versi terbaik dari dirimu? Di Physical Fitness, kami hadir untuk kamu yang ingin sehat tanpa ribet 
                dan mahal! Dengan fasilitas lengkap seperti gym yang bersih dan nyaman, pelatih bersertifikat, body 
                measurement GRATIS, hingga buku panduan dan kartu tantangan seru, semua ada di sini. Gak cuma itu, 
                ada juga Coaching Clinic gratis buat bantu kamu mencapai tujuan fitness kamu. Dengan harga yang ramah 
                di kantong dan lokasi yang mudah dijangkau, kami memastikan keamanan dan kenyamananmu selalu jadi prioritas. 
                Yuk, gabung sekarang dan jadilah bagian dari komunitas sehat dan kuat kami!
            </p>
        </div>

        <!-- Bagian Kanan -->
        <div class="service-right">
            <img src="<?php echo base_url('assets/service-img.png'); ?>" alt="Service Image" style=""/>
        </div>
    </div>
</div>

<!-- MEMBERSHIP SECTION -->
<div class="membership" id="member">
    <h2 class="membership-title">MEMBERSHIP PRICE PLAN</h2>
    <div class="membership-cards">
        <!-- Card 1 -->
        <?php foreach($membership as $m): ?>
            <div class="membership-card">
                <h3><?= $m['durasi'] ?> Days</h3>
                <p><?= $m['jenis_membership']?></p>
                <ul>
                    <?php $fasilitas = explode(',', $m['fasilitas'])?>
                    <?php foreach($fasilitas as $f):?>
                        <li><?= esc($f) ?></li>
                    <?php endforeach ?>
                </ul>
                <a href="https://wa.me/<?= $phone ?>?text=<?= $encodedMessage?>%20<?=$m['jenis_membership']?>" target="_blank" class="join-button">
                    Rp. <?= number_format($m['harga'], 0, ',', '.'); ?>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>


</body>
</html>
