<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $nama_usaha ?></title>

  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Favicons -->
  <link href="<?= base_url() ?><?= base_url() ?>assets/home/home/img/favicon.png" rel="icon">
  <link href="<?= base_url() ?><?= base_url() ?>assets/home/home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/admin/css/tables/datatable/datatables.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/admin/css/tables/datatable/extensions/dataTables.checkboxes.css" rel="stylesheet">

  <script src="<?= base_url() ?>assets/admin/vendor/jquery/dist/jquery.min.js"></script>
  <!-- <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/vfs_fonts.js"></script> -->
  <!-- <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/datatables.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/datatables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/buttons.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/datatables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/dataTables.select.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/vendor/js/tables/datatable/datatables.checkboxes.min.js"></script> -->

  <!-- <script src="<?= base_url() ?>assets/admin/vendor/js/script/datatable/datatables.datatable.js"></script> -->
  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/home/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url() ?>assets/home/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/home/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo">
        <a href="<?= base_url() ?>">
        <img style="width: 100%;" src="<?= base_url('assets/dataresto/foto_usaha/logo_mawo.png') ?>" /></a>
    </h1>
      
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="<?= base_url() ?>assets/home/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul id="navmenus">
            <li class="dropdown navm"><a href="#"><span>Master</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="#">Data Resto</a></li>
                <li><a href="#">Makanan & Minuman</a></li>
                </ul>
            </li>
            <li class="navm"><a href="<?= base_url() ?>">Home</a></li>
            <li class="navm"><a href="<?= base_url() ?>katalog">Katalog Menu</a></li>
            <li class="navm"><a href="<?= base_url() ?>home/booking">Booking Sekarang</a></li>
            <li class="navm"><a href="<?= base_url() ?>pembayaran/cari">Cek Pembayaran</a></li>
            <li class="navm"><a href="<?= base_url() ?>saran/add">Kritik & Saran</a></li>
            <!-- <li class="navm"><a href="<?= base_url() ?>admin">login</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <script>
   $(document).ready(function () {

            let nav = $('.navm');

            // console.log(nav.length)
            for (var i = 0; i < nav.length; i++){
                $(nav).on('click', function(){
                    let act = $('.active');
                    act[0]
                });
            }


// SET ACTIVE PAGE //
   // Get the current page URL
  var currentPage = window.location.hash;
    
    // Loop through each <a> element in the navbar
    $('#navmenus li a').each(function() {
      // Get the href attribute of the <a> element
      var href = $(this).attr('href');
  
      // If the href contains the current page
      if (currentPage.indexOf(href) !== -1) {
        // Add the 'active' class to its <li> element
        $(this).closest('li').addClass('active');
      }
    });
  
    // Update the active class whenever the URL hash changes
    $(window).on('hashchange', function() {
      $('#navmenus li').removeClass('active');
      currentPage = window.location.hash;
  
      $('#navmenus li a').each(function() {
        var href = $(this).attr('href');
  
        if (currentPage.indexOf(href) !== -1) {
          $(this).closest('li').addClass('active');
        }
      });
    });


   }); 
  </script>