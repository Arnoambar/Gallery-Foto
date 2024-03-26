<?php
session_start();
$userid = $_SESSION['userid'];
include "../config/koneksi.php";
if($_SESSION['status']!='login')
echo "<script>alert('Anda Belum Login');
location.href='../login.php';
</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="shortcut icon" href="../asset/img/yphk.png">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

</head>
<body style="background-color: aqua;">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid" style="background-color: black;">
    <a class="navbar-brand" href="index.php" style="color: white;">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
      <a href="home.php"class="btn btn-outline-primary m-1 col-md-10">Home</a>
        <a href="album.php"class="btn btn-outline-primary m-1 col-md-10">Album</a>
        <a href="foto.php"class="btn btn-outline-primary m-1 col-md-10">Foto</a>
        
        
      </div>
      <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Logout</a>
    </div>
  </div>
</nav>
   


<!--===== HEADER =====-->


        <main class="l-main">
            <!--===== HOME =====-->
            <section class="home bd-grid" id="home">
                <div class="home__data">
                    <h2 class="home__title">Haii,<h2>Saya adalah <span class="home__title-color">Arnozzlea Ambarita</span></h2><p>Peserta UKK 2024 dan saya membuat aplikasi wbesite Galeri Foto</p><p>Selamat datang apliksi website galeri saya.</p></h2>

                    <a href="#" class="button">Contact</a>
                </div>

                <div class="home__social">
                    <a href="" class="home__social-icon"><i class='bx bxl-linkedin'></i></a>
                    <a href="" class="home__social-icon"><i class='bx bxl-behance' ></i></a>
                    <a href="" class="home__social-icon"><i class='bx bxl-github' ></i></a>
                </div>

                <div class="home__img">
                    <svg class="home__blob" viewBox="0 0 479 467" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <mask id="mask0" mask-type="alpha">
                            <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                        </mask>
                        <g mask="url(#mask0)">
                            <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                            <image class="home__blob-img" x="50" y="60" href="../assets/img/arno2.png"/>
                        </g>
                    </svg>
                </div>
            </section>

            <!--===== ABOUT =====-->
            <section class="about section " id="about">
                <h2 class="section-title">About</h2>

                <div class="about__container bd-grid">
                    <div class="about__img">
                        <img src="../asset/img/icon2.png" alt="">
                    </div>
                    
                    <div>
                        <h2 class="about__subtitle">Pengertian Galeri Foto</h2>
                        <p class="about__text">Website gallery identik dengan album foto. Karena website jenis ini memang dibuat untuk menampilkan kumpulan foto-foto. Dimana foto-foto bisa dikelompokkan berdasarkan hal tertentu. Misalnya saja peristiwa, tanggal, atau kategori lainnya.</p>           
                    </div>                                   
                </div>
            </section>

            <!--===== SKILLS =====-->
            <section class="skills section" id="skills">
                <h2 class="section-title">Skills</h2>

                <div class="skills__container bd-grid">          
                    <div>
                        <h2 class="skills__subtitle">Profesional Skills</h2>
                        <p class="skills__text">Di dalam diri seseorang wajib memiliki suatu kemampuan dimana pada bagian ini menunjjukkan potensi saya dalam keahlian saya.</p>
                        <div class="skills__data">
                            <div class="skills__names">
                                <i class='bx bxl-html5 skills__icon'></i>
                                <span class="skills__name">HTML5</span>
                            </div>
                            <div class="skills__bar skills__html">

                            </div>
                            <div>
                                <span class="skills__percentage">95%</span>
                            </div>
                        </div>
                        <div class="skills__data">
                            <div class="skills__names">
                                <i class='bx bxl-css3 skills__icon'></i>
                                <span class="skills__name">CSS3</span>
                            </div>
                            <div class="skills__bar skills__css">
                                
                            </div>
                            <div>
                                <span class="skills__percentage">85%</span>
                            </div>
                        </div>
                        <div class="skills__data">
                            <div class="skills__names">
                                <i class='bx bxl-javascript skills__icon' ></i>
                                <span class="skills__name">JAVASCRIPT</span>
                            </div>
                            <div class="skills__bar skills__js">
                                
                            </div>
                            <div>
                                <span class="skills__percentage">65%</span>
                            </div>
                        </div>
                        <div class="skills__data">
                            <div class="skills__names">
                                <i class='bx bxs-paint skills__icon'></i>
                                <span class="skills__name">Desain  </span>
                            </div>
                            <div class="skills__bar skills__ux">
                                
                            </div>
                            <div>
                                <span class="skills__percentage">85%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>              
                        <img src="../assets/img/work3.jpg" alt="" class="skills__img">
                    </div>
                </div>
            </section>

            <!--===== WORK =====-->
            <section class="work section" id="work">
                <h2 class="section-title">Work</h2>

                <div class="work__container bd-grid">
                    <a href="" class="work__img">
                        <img src="../assets/img/work1.jpg" alt="">
                    </a>
                    <a href="" class="work__img">
                        <img src="../assets/img/work2.jpg" alt="">
                    </a>
                    <a href="" class="work__img">
                        <img src="../assets/img/work3.jpg" alt="">
                    </a>
                    <a href="" class="work__img">
                        <img src="../assets/img/work4.jpg" alt="">
                    </a>
                    <a href="" class="work__img">
                        <img src="../assets/img/work5.jpg" alt="">
                    </a>
                    <a href="" class="work__img">
                        <img src="../assets/img/work6.jpg" alt="">
                    </a>
                </div>
            </section>
        </main>

        <!--===== FOOTER =====-->
        <footer class="footer">
            <p class="footer__title">ARNOZZLEA AMBARITA</p>
            <div class="footer__social">
                <a href="https://www.facebook.com/arno.zzlea.1" class="footer__icon"></a>
                <a href="https://www.instagram.com/arnolambarita/" class="footer__icon"></a>
                <a href="https://www.instagram.com/arnolambarita/" class="footer__icon"></a>
            </div>
            💙
💙
💙
💙
💙
  <p>&copy; UKK RPL 2024 | Arnozzlea Ambarita</p>
💙
💙
💙
💙
💙

        </footer>


        <!--===== SCROLL REVEAL =====-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--===== MAIN JS =====-->
        <script src="../assets/js/main.js"></script>

    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>
</html>