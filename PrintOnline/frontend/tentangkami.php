 <?php
    session_start();
    require 'function.php';
    include 'include/_header.php';

    $produk = query('SELECT * FROM produk order by rand()');

    ?>
 <?php include 'include/navbar.php'; ?>
 <div class="ht__bradcaump__area bg-image--1">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="bradcaump__inner text-center">
                     <h2 class="bradcaump-title">Tentang Kami</h2>
                     <nav class="bradcaump-content">
                         <a class="breadcrumb_item" href="dashboard.php">Home</a>
                         <span class="brd-separetor">/</span>
                         <span class="breadcrumb_item active">Upload Design</span>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <head>
     <title>The King | Tentang Kami</title>
     <link rel="stylesheet" type="text/css" href="css.css">
 </head>

 <body>

     <!-- Start Contact Area -->
     <section class="wn_contact_area bg--white pt--80 pb--80">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12 col-12 md-mt-40 sm-mt-40">
                     <div class="wn__address">
                         <div class="text-center">
                             <h2 class="contact__title">Tentang Kami</h2>
                             <p>The King Advertising adalah sebuah tempat usaha percetakan di Bondowoso yang berdiri sejak tahun 2011. The King Printing melayani berbagai macam percetakan mulai. </p>
                             <p>The King Advertising telah beroperasi sejak tahun 2011 yang masih melayani percetakan unuk beberapa produk saja. Saat ini usaha ini telah berkembang pesat seperti yang telah diketahui bukan hanya melakukan percetakan saja namun dapat juga melayani jasa desain.</p>
                         </div>
                         <div class="wn__addres__wreapper">

                             <div class="single__address">
                                 <i class="icon-location-pin icons"></i>
                                 <div class="content">
                                     <span>Alamat :</span>
                                     <p>Jalan K.I.S Mangunsarkoro, kampung templek, Kelurahan Dabasah, Kecamatan Bondowoso, Kabupaten Bondowoso.</p>
                                 </div>
                             </div>

                             <div class="single__address">
                                 <i class="icon-phone icons"></i>
                                 <div class="content">
                                     <span>No Telepon :</span>
                                     <p>(+62)823 3111 6981 </p>
                                 </div>
                             </div>

                             <div class="single__address">
                                 <i class="icon-envelope icons"></i>
                                 <div class="content">
                                     <span>Alamat Email:</span>
                                     <p>digitaltheking@gmail.com</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <?php
        include 'include/_footer.php';
        ?>