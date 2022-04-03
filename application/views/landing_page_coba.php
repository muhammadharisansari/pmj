       <?php foreach ($nasabah_ as $n) :
          if ($n->blokir == 'ya') {
        ?>
           <!-- ======= Hero Section ======= -->
           <!-- <section id="hero" class="d-flex flex-column justify-content-center align-items-center"> -->

           <div class="alert alert-danger text-center" role="alert" data-aos="zoom-in">
             <h4> <i class='bx bxs-error'></i> Akun anda sedang <strong>diblokir</strong> <i class='bx bxs-error'></i></h4>
           </div>
         <?php } ?>
         <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
           <div class="container" data-aos="fade-in">
             <h1>Halo <?= $n->username_nasabah;  ?></h1>
             <h2>Bersama PMJ, lingkungan terjaga masyarakat sejahtera</h2>
           </div>
         </section>
         <!-- End Hero -->

         <!-- ======= Why Us Section ======= -->
         <section id="why-us" class="why-us">
           <div class="container">

             <div class="row">
               <div class="col-xl-4 col-lg-5" data-aos="fade-up">
                 <div class="content">
                   <h4><i class="bx bx-money"></i> &nbsp; Saldo saat ini</h4>
                   <h3>
                     Rp.<?= rupiah($n->sisa_saldo) ?>
                   </h3>
                   <div class="text-center">
                     <a href="<?php echo base_url(); ?>deposit" class="more-btn">tarik saldo <i class="bx bx-chevron-right"></i></a>
                   </div>
                 </div>
               </div>
             <?php endforeach; ?>
             <div class="col-xl-8 col-lg-7 d-flex">
               <div class="icon-boxes d-flex flex-column justify-content-center">
                 <div class="row">
                   <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                     <div class="icon-box mt-4 mt-xl-0">
                       <i class="bx bx-receipt"></i>
                       <h4>Riwayat setoran minyak</h4>
                       <div class="text-center">
                         <a href="<?php echo base_url(); ?>riwayat_minyak">
                           <h5> cek riwayat </h5>
                         </a>
                       </div>
                     </div>
                   </div>

                   <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                     <div class="icon-box mt-4 mt-xl-0">
                       <i class="bx bx-receipt"></i>
                       <h4>Riwayat penarikan</h4>
                       <div class="text-center">
                         <a href="<?php echo base_url(); ?>mutasi_nasabah">
                           <h5> cek status </h5>
                         </a>
                       </div>
                     </div>
                   </div>

                   <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                     <div class="icon-box mt-4 mt-xl-0">
                       <i class="bx bx-food-menu"></i>
                       <h4>Menu lainnya</h4><br>
                       <div class="text-center">
                         <a href="<?php echo base_url(); ?>menu_lainnya">
                           <i class="bx bxs-right-arrow-square"></i>
                         </a>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             </div>

           </div>
         </section>
         <!-- End Why Us Section -->

         <!-- ======= F.A.Q Section ======= -->
         <section id="services" class="faq section-bg">
           <div class="container">

             <div class="section-title">
               <h2 data-aos="fade-up">INFORMASI TERKINI</h2>
             </div>

             <!-- iklan -->
             <div class="row mb-2">
               <div class="container" data-aos="fade-up">
                 <div id="carouselExampleIndicators" class="carousel slide shadow" data-ride="carousel">

                   <div class="carousel-inner">
                     <?php foreach ($carosel_ as $c) :
                        if ($c->id_carosel == 1) {
                      ?>
                         <div class="carousel-item active">
                           <img src="<?php echo base_url('assets/img/' . $c->file_carosel) ?>" class="d-block w-100" style="width: 100px">
                         </div>
                       <?php } else { ?>
                         <div class="carousel-item">
                           <img src="<?php echo base_url('assets/img/' . $c->file_carosel) ?>" class="d-block w-100" style="width: 100px">
                         </div>
                     <?php }
                      endforeach; ?>
                   </div>
                   <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                   </a>
                   <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                   </a>
                 </div>
               </div>
             </div>
             <!-- akhir iklan -->

             <?php foreach ($info_ as $f) : ?>
               <a href="info" class="text-primary">
                 <div class="list-group-item list-group-item-action  mt-3" aria-current="true" data-aos="fade-up">
                   <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1 text-success"><strong><?= $f->judul_info ?></strong></h5>
                     <small><strong><?= $f->tanggal_info; ?></strong></small>
                   </div>
                   <p class="mb-1 text-justify"><?= word_limiter($f->konten_info, 15); ?></p>
                 </div>
               </a>
             <?php endforeach; ?>

             <div class="text-center mt-3" data-aos="fade-up">
               <a href="<?php echo base_url(); ?>info">
                 <h5> Informasi lainnya.. </h5>
               </a>
             </div>

           </div>
         </section>
         <!-- End F.A.Q Section -->

         <!-- ======= Pricing Section ======= -->
         <section id="pricing" class="pricing">
           <div class="container">

             <div class="section-title">
               <h2 data-aos="fade-up">Nilai Tukar</h2>
               <p data-aos="fade-up" class="text-justify">
                 Harga yang tertera bisa berubah sewaktu-waktu, mengikuti perubahan harga di pasar minyak dunia. Hanya minyak jelantah murni (tidak tercampur zat kimia seperti oli, air, dll). Jika terdapat minyak yang tidak murni, maka pihak PMJ berhak menolak transaksi.
               </p>
             </div>

             <div class="row justify-content-center">

               <?php foreach ($harga_ as $h) : ?>

                 <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
                   <div class="box featured">
                     <h3><?= $h->ukuran; ?> ml</h3>
                     <h4><sup>Rp</sup><?= $h->harga; ?></h4>
                     <p class="text-justify"><strong>note :</strong><br><?= $h->keterangan; ?></p>
                   </div>
                 </div>

               <?php endforeach; ?>

             </div>

           </div>
         </section>
         <!-- End Pricing Section -->

         <!-- ======= Contact Section ======= -->
         <section id="contact" class="faq section-bg">
           <div class="container">

             <div class="section-title">
               <h2 data-aos="fade-up">Kontak</h2>
             </div>
             <?php foreach ($kontak_ as $k) : ?>
               <div class="row justify-content-center">
                 <div class="col-xl-3 col-lg-4 mt-4 shadow-sm" data-aos="fade-up">
                   <div class="info-box">
                     <i class="bx bx-map"></i>
                     <h3>Alamat</h3>
                     <p><?= $k->alamat_pmj; ?></p>
                   </div>
                 </div>

                 <div class="col-xl-3 col-lg-4 mt-4 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                   <div class="info-box">
                     <i class="bx bx-envelope"></i>
                     <h3>Email</h3>
                     <p><?= $k->email_pmj; ?></p>
                   </div>
                 </div>
                 <div class="col-xl-3 col-lg-4 mt-4 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                   <div class="info-box">
                     <i class="bx bx-phone-call"></i>
                     <h3>Whatshap</h3>
                     <p><?= $k->wa_pmj; ?></p>
                   </div>
                 </div>
                 <div class="col-xl-3 col-lg-4 mt-4 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                   <div class="info-box">
                     <i class="icofont-clock-time icofont-flip-horizontal"></i>
                     <h3>Jam pelayanan</h3>
                     <p><?= $k->jam_pmj; ?></p>
                   </div>
                 </div>
               </div>

               <div class="embed-responsive embed-responsive-21by9 mt-4">
                 <?= $k->map_pmj; ?>
               </div>
             <?php endforeach; ?>
           </div>
         </section><!-- End Contact Section -->