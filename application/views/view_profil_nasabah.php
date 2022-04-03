         <!-- Vendor CSS-->
         <link href="<?php echo base_url(); ?>assets/template/signup/vendor/select2/select2.min.css" rel="stylesheet" media="all">



         <div class="container mt-4">

             <div class="row mt-4 ml-2 ">
                 <h4><strong>Form Profil</strong></h4>
             </div>

             <div class="shadow" data-aos="zoom-in">
                 <?php echo $this->session->flashdata('pesan') ?>
             </div>

             <div class="card shadow-sm mt-2">
                 <div class="card-header">
                     <?php
                        foreach ($nasabah_ as $n) :
                            if ($n->status_verifikasi == 'diverifikasi') {
                        ?>
                             <h4 class="text-success text-center mt-2"><strong><?= $n->status_verifikasi ?></strong><i class="bx bx-check"></i></h4>
                 </div>
             <?php } elseif ($n->status_verifikasi == 'menunggu') { ?>
                 <h4 class=" text-center mt-2"><i class="bx bx-time"></i>&nbsp;<strong><?= $n->status_verifikasi ?></strong></h4>
             </div>
         <?php } ?>

         <div class="card-body">

             <?php echo form_open_multipart('profil_nasabah/update_nasabah_aksi') ?>

             <div class="container-fluid">
                 <div class="row mt-3">
                     <div class="col-md-12 col-lg-5 text-center ">
                         <div class="row justify-content-center">
                             <div class="form-group mt-4">
                                 <input type="hidden" name="ktp_lama" value="<?= $n->ktp_nasabah; ?>">

                                 <?php if ($n->ktp_nasabah) { ?>

                                     <img src="<?php echo base_url() . 'assets/upload/' . $n->ktp_nasabah ?>" style="width: 400px">
                                 <?php } else { ?>
                                     <img src="<?php echo base_url() . 'assets/admin_foto/kosong.png' ?>" style="width: 400px">
                                 <?php } ?>
                                 <br><br>
                                 <?php if ($n->status_verifikasi == 'menunggu') { ?>
                                     <input type="file" name="userfile">
                                 <?php } ?>
                             </div>
                         </div>
                         <div class="row justify-content-center mt-4">
                             <div class="card">
                                 <div class="card-header">
                                     <strong>Ubah Password</strong>
                                 </div>
                                 <div class="card-body">
                                     <div class="row m-3">
                                         <label class="form-label">Password Lama :</label>
                                         <input hidden type="password" name="kosong" class="form-control" value="<?= $n->password_nasabah ?>">
                                         <input type="password" name="password_lama" class="form-control">
                                     </div>
                                     <div class="row m-3">
                                         <label class="form-label">Password Baru :</label>
                                         <input type="password" name="password_baru" class="form-control">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="col-md col-lg-7">
                         <div class="row m-3">
                             <label class="form-label">NIK :</label>
                             <input type="hidden" name="id_nasabah" class="form-control" value="<?= $n->id_nasabah; ?>">
                             <input type="hidden" name="NIK" class="form-control" value="<?= $n->nik_nasabah; ?>" required>
                             <input disabled class="form-control" value="<?= $n->nik_nasabah; ?>">
                         </div>
                         <div class="row m-3">
                             <label class="form-label">Nama Lengkap :</label>
                             <input type="text" name="nama" class="form-control" value="<?= $n->nama_nasabah; ?> " required>
                         </div>
                         <div class="row m-3">
                             <label class="form-label">Tanggal Lahir :</label>
                             <input type="date" name="tanggal" class="form-control" value="<?= $n->tl_nasabah; ?>" required>
                         </div>
                         <div class="row m-3">
                             <label for="inputUserName" class=" control-label">Jenis Kelamin :</label>
                             <div class="col-7 ">
                                 <?php if ($n->jk_nasabah == 'Laki-laki') : ?>

                                     <div class="radio radio-info radio-inline">
                                         <input type="radio" id="inlineRadio1" value="Laki-laki" name="jk" checked>
                                         <label for="inlineRadio1">Laki-laki</label>

                                         <input type="radio" id="inlineRadio2" value="Perempuan" name="jk">
                                         <label for="inlineRadio2">Perempuan</label>
                                     </div>

                                 <?php else : ?>
                                     <div class="radio radio-info radio-inline">
                                         <input type="radio" id="inlineRadio1" value="Laki-laki" name="jk">
                                         <label for="inlineRadio1">Laki-laki</label>

                                         <input type="radio" id="inlineRadio2" value="Perempuan" name="jk" checked>
                                         <label for="inlineRadio2">Perempuan</label>
                                     </div>
                                 <?php endif; ?>
                             </div>

                         </div>
                         <div class="row m-3">
                             <label class="form-label">Alamat :</label>
                             <textarea name="alamat" class="form-control" required><?= $n->alamat_nasabah; ?></textarea>
                         </div>
                         <div class="row m-3">
                             <label class="form-label">No HP :</label>
                             <input type="number" name="hp" class="form-control" value="<?= $n->hp_nasabah; ?>" required>
                         </div>
                         <div class="row m-3">
                             <label class="form-label">Username :</label>
                             <input hidden type="text" name="username" class="form-control" value="<?= $n->username_nasabah; ?>">
                             <input disabled class="form-control" value="<?= $n->username_nasabah; ?>">
                         </div>
                         <div class="row m-4">

                             <label class="form-label">Bank :</label>
                             <div class="form-select js-select-simple col-7">
                                 <select name="bank" class="form-control">
                                     <option hidden selected><?= $n->bank_nasabah ?></option>
                                     <?php foreach ($bank_ as $b) : ?>
                                         <option value="<?= $b->nama_bank ?>"><?= $b->nama_bank ?></option>
                                     <?php endforeach; ?>
                                 </select>
                                 <div class="select-dropdown"></div>
                             </div>
                         </div>

                         <div class="row m-3">
                             <label class="form-label">Rekening :</label>
                             <input type="number" name="rekening" class="form-control" value="<?= $n->rek_nasabah; ?>" required>
                             <div class="form-text text-danger ml-2">*Mohon ketikan dengan teliti ketika merubah</div>
                         </div>
                     <?php endforeach; ?>
                     <button type="submit" class="btn btn-outline-success mb-5 mt-4 ">Perbarui</button>
                     <?php form_close(); ?>
                     </div>
                 </div>
             </div>
         </div>
         </div>
         </div>

         <!-- Jquery JS-->
         <script src="<?php echo base_url(); ?>assets/template/signup/vendor/jquery/jquery.min.js"></script>
         <!-- Vendor JS-->
         <script src="<?php echo base_url(); ?>assets/template/signup/vendor/select2/select2.min.js"></script>

         <!-- Main JS-->
         <script src="<?php echo base_url(); ?>assets/template/signup/js/global.js"></script>