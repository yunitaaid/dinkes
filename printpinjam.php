<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Layanan Dinas Kesehatan Kota Semarang</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">dinkes@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>085436172835 </span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h5 class="sitename">Dinas Kesehatan Kota Semarang</h5>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="/dinkes/dashboard" >Home<br></a></li>
           
            <li><a class="no-print" href="#" onclick="printDiv('halamancetak')">Cetak Registrasi</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

       

      </div>

    </div>

  </header>
        
    
  <main id="main">
  
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        
        
        <br>
        <div class="row gx-lg-0 gy-4">
        <div class="card bg-success text-white">
            <div class="card-body ">Silakan Cetak Surat Permohonan di Bawah ini dan Serahkan Kepada 
              Petugas Ketika Penyerahan Alat disertai dengan FC KTP Pemohon</div>  
        </div>
          <div id="halamancetak" class="col-lg-12">
            <div class="custom-paper">
              
              <h3 style="text-align: center; font-weight: bold;"><u>SURAT PERMOHONAN</u></h3>

              <div style="padding-left: 10mm;padding-right: 10mm;">
                <?php 
                 
                // Koneksi ke database
                $host = "localhost";
                $user = "root";
                $password = "";
                $database = "dinkes";

                $conn = new mysqli($host, $user, $password, $database);
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Ambil ID dari URL
                $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                $peminjaman = null;
                if ($id > 0) {
                    $sql = "SELECT * FROM alat WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $permohonan = $result->fetch_assoc();
                    } else {
                        echo "Data tidak ditemukan.";
                        exit;
                    }

                    $stmt->close();
                } else {
                    echo "ID tidak valid.";
                    exit;
                }


                ?>
                  <div class="form-header">
                      <table class="info-table">
                          <tbody>
                              <tr>
                                  <td colspan="3">Saya yang bertanda tangan di bawah ini :</td>
                              </tr>
                              <tr>
                                  <td style="width: 20%;">Nama</td>
                                  <td class="middle-col" style="width: 5%;">:</td>
                                  <td style="width: 75%;"><?php echo $permohonan['nama']; ?></td>
                              </tr>
                              <tr>
                                  <td style="width: 20%;">NIK</td>
                                  <td class="middle-col" style="width: 5%;">:</td>
                                  <td style="width: 80%;"><?php echo $permohonan['nik']; ?></td>
                              </tr>
                              <tr>
                                  <td style="width: 20%;">Alamat</td>
                                  <td class="middle-col" style="width: 5%;">:</td>
                                  <td style="width: 80%;"><?php echo $permohonan['alamat']; ?></td>
                              </tr>
                              <tr>
                                  <td style="width: 20%;">Nomor Telepon</td>
                                  <td class="middle-col" style="width: 5%;">:</td>
                                  <td style="width: 80%;"><?php echo $permohonan['telepon']; ?></td>
                              </tr>
                              <tr>
                                  <td style="width: 20%;">Alat Yang Dipinjam</td>
                                  <td class="middle-col" style="width: 5%;">:</td>
                                  <td style="width: 80%;"><?php echo $permohonan['alat']; ?></td>
                              </tr>
                              <tr>
                                  <td colspan="3">Mengajukan Permohonan Pinjam Alat Kesehatan sebagaimana yang Saya ajukan di atas pada :</td>
                              </tr>
                              <tr>
                                  <td style="width: 20%;">Tanggal Peminjaman</td>
                                  <td class="middle-col" style="width: 5%;">:</td>
                                  <td style="width: 80%;"><?php echo $permohonan['tanggal_pinjam']; ?></td>
                              </tr>
                              <tr>
                                  <td style="width: 20%;">Tanggal Pengembalian</td>
                                  <td class="middle-col" style="width: 5%;">:</td>
                                  <td style="width: 80%;"><?php echo $permohonan['tanggal_kembali']; ?></td>
                              </tr>
                              <tr>
                                  <td style="width: 20%;">Akomodasi</td>
                                  <td class="middle-col" style="width: 5%;">:</td>
                                  <td style="width: 80%;"><?php echo $permohonan['akomodasi']; ?></td>
                              </tr>
                              <tr>
                                  <td style="width: 20%;">Keterangan</td>
                                  <td class="middle-col" style="width: 5%;">:</td>
                                  <td style="width: 80%;"><?php echo $permohonan['keterangan']; ?></td>
                              </tr>
                              <tr>
                                <td colspan="3" style="text-align: justify;"> 
                                  Apabila terjadi hal-hal yang menyebabkan kehilangan/kerusakan akibat 
                                          penggunaan yang tidak sesuai, maka menjadi tanggung jawab sepenuhnya pihak
                                          Saya sebagai peminjam.
                                      
                                  
                                </td>
                              </tr>

                              <tr>
                                  <td colspan="3">Demikian permohonan yang Saya ajukan, Atas perhatiannya Saya ucapkan terima kasih</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>

                  
                  </div>

                  <div class="signature-area" style="display: flex; justify-content: space-between; align-items: center;">
                      <div class="signature-block" style="flex: 1; text-align: center;">
                          <div>&nbsp;</div>
                          <div style="margin-left: 0mm; padding-right: 20mm;">a.n. peminjam,</div>
                          <div style="margin-top: 20mm;">..............................</div>
                      </div>
                      <div class="signature-block" style="flex: 1; text-align: center;">
                          <div>Semarang, <?php echo date('d F Y'); ?></div>
                          <div>yang menyerahkan,</div>
                          <div style="margin-top: 20mm;">..............................</div>
                      </div>
                  </div>
              </div>
          </div>
          
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


  <footer id="footer" class="footer light-background">

    

    <div class="container copyright text-center mt-4">
      <p><span></span> <strong class="px-1 sitename">Dinas Kesehatan Kota Semarang</strong> <span></span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
       Jalan Pemuda No 23 Kota Semarang 501878 
      </div>
    </div>

  </footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    function printDiv(divId) {
    var divContents = document.getElementById(divId).innerHTML;
    var printWindow = window.open('', '', 'height=800,width=1000');
    printWindow.document.write('<html><head><title>Cetak</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('body { font-family: Arial, sans-serif; padding: 20px; }');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; margin-top: 20px; }');
    printWindow.document.write('td, th { padding: 8px; }');
    printWindow.document.write('</style>');
    printWindow.document.write('</head><body >');
    printWindow.document.write(divContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    printWindow.close();
    }
</script>


</body>

</html>