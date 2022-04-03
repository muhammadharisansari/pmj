<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container d-lg-flex py-4 mt-5">

        <div class="mr-lg-auto text-center text-lg-left"> 
            <div class="copyright">
                &copy; Copyright <strong><span>PMJ IT</span></strong> Team V.beta
            </div>
            <!-- <div class="credits"> -->
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/ -->
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            <!-- </div> -->
        </div>

        <?php
        $kontak = $this->kontak_model->tampil_data('kontak');

        if ($kontak->num_rows() > 0) {

            foreach ($kontak->result() as $ck) {
                $wa     = $ck->wa_pmj;
                $fb     = $ck->fb_pmj;
                $ig     = $ck->ig_pmj;
            }
        }
        ?>

        <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
            <a href="http://wa.me/<?= $wa ?>/" target="blank_" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
            <a href="https://www.facebook.com/<?= $fb ?>/" target="blank_" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/<?= $ig ?>/" target="blank_" class="instagram"><i class="bx bxl-instagram"></i></a>

        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Jquery JS-->
<script src="<?php echo base_url(); ?>assets/template/signup/vendor/jquery/jquery.min.js"></script>

<!-- Vendor JS Files -->
<script src="<?php echo base_url(); ?>assets/template/signup/vendor/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url(); ?>assets/template/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="<?php echo base_url(); ?>assets/template/vendor/venobox/venobox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/vendor/aos/aos.js"></script>

<script src="<?php echo base_url(); ?>assets/template/signup/vendor/datepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/signup/vendor/datepicker/daterangepicker.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets/template/js/main.js"></script>
<!-- Main JS-->
<script src="<?php echo base_url(); ?>assets/template/signup/js/global.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>