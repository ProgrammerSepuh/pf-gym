<style>
    body {
        margin: 0;
        font-family: "Kanit", sans-serif;
    }

    #foot {
        background-color: #000000;
        color: white;
        padding: 1.5rem 0; 
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        text-align: left; 
    }

    .col {
        margin: 1rem;
        min-width: 150px;
    }

    h5 {
        font-weight: 400; 
        font-size: 36px; 
        color: white; 
        margin-bottom: 0.5rem; 
        font-family: 'Bebas Neue', sans-serif;
        text-align: left; 
    }

    p {
        margin: 0.5rem 0;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        color: white;
        text-align: left; 
        font-size: 0.8em; 
    }


    .contact-text {
        text-align: left; 
    }

    a {
        text-decoration: none;
        color: white;
    }

    a:hover {
        text-decoration: underline;
    }

    hr {
        margin: 1rem 0; 
        border: 0;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .align-items-center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .social-media-icons {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 10px;
    }

    .social-media-icons a {
        color: white;
        font-size: 1.5em;
        transition: color 0.3s;
    }

    .social-media-icons a:hover {
        color: #FF0000;
    }

    .contact-text a {
        color: white;
        transition: color 0.3s;
    }

    .contact-text a:hover {
        color: #FF0000;
    }

</style>

<footer id="foot">
    <div class="container">
        <div class="row">
            <div class="col">
                <h5>PF <span style="color: red;">GYM</span> & FITNESS</h5>
                <p>
                    PF GYM was Gym and Fitness Nutritionist, Wellness Club and Supplement Producer. Our goals to be the premium fitness center that inspires and foster a strong community in health and wellness through 101 education in fitness.
                </p>
            </div>
            <div class="col">
                <h5>ADDRESS</h5>
                <p>
                    Cabang 1 : 
                </p>
                <p>Sanggrahan, Condongcatur, Depok, Sleman Regency, Special Region of Yogyakarta 55281</p>
                <p>
                    Cabang 2 : 
                </p>
                <p>Kembaran, Tamantirto, Kasihan, Bantul Regency, Special Region of Yogyakarta 55184 </p>
            </div>
            <div class="col">
                <h5>Contact</h5>
                <p class="contact-text">
                    <a href="https://api.whatsapp.com/send/?phone=62895392062783&text&type=phone_number&app_absent=0" target="_blank">
                        +62 895-3920-62783
                    </a>
                </p>

                <!-- Social Media Icons -->
                <div class="social-media-icons">
                    <a href="https://www.instagram.com/pfgymandfitness/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://x.com/pfjogja" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UCk31VGhF5zIEF4Ru_YITTFw" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.tiktok.com/@pfgymandfitness" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
// Untuk Scrolling
    document.querySelectorAll('.bar h4').forEach(item => {
        item.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('data-scroll'));
            if (target) {
                const offset = 100;
                const targetPosition = target.offsetTop - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
</script>


