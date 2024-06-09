<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Beranda - Pasca Sarjana UNSIQ</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/mystyles.css')}}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        @yield('style')
        <style>

        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-light navbar-dark fixed-top bayangan" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{asset('assets/img/Logo_Pasca.png')}}" alt="..." /></a>
                <button class="navbar-toggler navbar-dark merah-marun" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- Menu -->
                    <i class="fas fa-bars ms-1"></i>
                </button>
               
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                        <!-- dropdown link Prodi -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Program Studi
                            </a>
                            <div class="dropdown-menu text-putih animasi" aria-labelledby="navDropdown">
                                <a class="dropdown-item" href="pai">Pend. Agama Islam (S2)</a>
                                <a class="dropdown-item" href="tafsir">Ilmu Qur'an Tafsir (S2)</a>
                            </div>
                        </li>

                        <!-- dropdown link layanan -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navDropdown" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Layanan
                            </a>
                            <div class="dropdown-menu text-putih" aria-labelledby="navDropdown">
                                <a class="dropdown-item" href="login-mhs">Mahasiswa</a>
                                <a class="dropdown-item" href="mhs-pembayaran">Pembayaran Mahasiswa</a>
                                <a class="dropdown-item" href="perpustakaan">Perpustakaan</a>
                                <a class="dropdown-item" href="unduhan">File Unduhan</a>
                                <a class="dropdown-item" href="#">E-Learning</a>
                                <a class="dropdown-item" href="mhs-thesis">E-Thesis</a>
                            </div>
                        </li>
                        <!-- dropdown link Profil -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navDropdown" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Profil
                            </a>
                            <div class="dropdown-menu text-putih" aria-labelledby="navDropdown">
                                <a class="dropdown-item" href="sejarah">Sejarah Pasca Sarjana UNSIQ</a>
                                <a class="dropdown-item" href="visi-misi">Visi, Misi, Tujuan, <br> Sasaran  dan Strategi</a>
                                <a class="dropdown-item" href="struktur-organisasi">Struktur Organisasi</a>
                            </div>
                        </li>
                        <!-- selesai dropdown link -->
                        <li class="nav-item"><a class="nav-link" href="#">SPMI</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('auth.login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead fade-in-kanan" id="home">
            <div class="row col-md-12 tinggi">
                <div class="col-md-12 align-top abu-muda fade-in bentuk">
                    <div class="col-md-12 abu-tua tinggi fade-in bentuk">
                        <div class="col-md-12 merah tinggi">
                            <div class="geser-kanan fade-in container">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="masthead-heading text-uppercase">PASCA <br>SARJANA</div>
                                <h5>Program Pasca Sarjana</h5>
                                <div class="putih"></div><br>
                                <div class="text-putih">
                                    Universitas Sains Al-Qur’an 2023 <br>
                                    Jawa Tengah di Wonosobo
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="container head-kecil text-center"> <br>
                                
                <div class="masthead-heading text-uppercase text-center">
                    <br>
                    <br>
                    <br> 
                    PASCA SARJANA
                </div>
                <div class="masthead-subheading">Universitas Sains Al-Qur’an 2023 <br>Jawa Tengah di Wonosobo</div>
                    <br>
                <img src="{{asset('assets/img/Logotext_UNSIQ_n.png')}}" alt="" width="150">

            </div>
            <div class="kanan-logo">
                <!-- <img src="{{asset('assets/img/Logotext_UNSIQ_n.png')}}" alt=""> -->
            </div>
            <!-- <div class="masthead-heading text-uppercase">PASCA SARJANA</div>
            <div class="masthead-subheading">Universitas Sains Al-Qur'an</div> -->
        </header>
        <section class="putih-tulang p-3">
            <div class="container">
                <!-- Content of the "Pengumuman" section -->
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExample4" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExample4" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExample4" data-bs-slide-to="2"></li>
                    <!-- Add more indicators as needed -->
                </ol>
                <!-- Add the carousel indicators here -->
                
                <!-- End of carousel indicators -->
            </div>
        </section>
       @yield('content')
       
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-lg-6 text-lg-start">
                       <img src="{{asset('assets/img/Logotext_UNSIQ_n.png')}}" alt="..." width="200"/>
                       <div class="putih mt-5 mb-3"></div>
                       <h6 class="text-white">Program Pascasarjana UNSIQ</h6>
                            <p class="text-putih text-white">
                            Universitas Sains Al Qur’an <br>
                            Jawa Tengah di Wonosobo
                        </p>
                    </div>
                    <div class="col-lg-3 text-lg-start">
                        <h6 class="text-white">Tentang Fakultas</h6> <br>
                            <p class="text-putih text-white">
                            Sejarah Pascasarjana UNSIQ
                        </p>
                    </div>
                    <div class="col-lg-3 text-lg-end">
                        <h6 class="text-white">Kontak</h6> <br>
                        <div class=" text-putih text-white">
                            Jl. KH. Hasyim Asy'ari Km. 03, Kalibeber, Kec. Mojotengah, Kab. Wonosobo,
                            Jawa Tengah - 56351 <br>
                            Telp. : (0286) ****** <br>
                            Fax. : (0286) *******
        </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 text-lg-start">Copyright &copy; All Right Reserved 2023, Pascasarjana, UNSIQ</div>
                    
                    <div class="col-lg-4 text-lg-end">
                    <a class="btn btn-dark btn-social mx-2" href="instagram.com" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="facebook.com" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="twitter.com" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        @yield('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Bootstrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS -->
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('js/bootstrap.js')}}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
 
    </body>
</html>
