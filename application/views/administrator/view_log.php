<div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block ">
                            <img src="<?php echo base_url(); ?>assets/template/img/pmj_bg.png">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back, Admin !</h1>
                                </div>

                                <div class="shadow" data-aos="zoom-in">
                                    <?php echo $this->session->flashdata('pesan') ?>
                                </div>

                                <form action="<?php echo base_url() . 'administrator/logadm/login_aksi' ?>" method="Post" enctype="multipart/form-data" class="user">
                                    <div class="form-group">
                                        <input type="text" name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username.." required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password.." required>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block mt-5">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>