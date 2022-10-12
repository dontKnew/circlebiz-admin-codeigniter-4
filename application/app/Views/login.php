<?= $this->extend('include/app2') ?>

<?= $this->section('contents') ?>
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <img src="https://www.circlebiz.in/images/logo.png" alt="circlebiz_logo" width="150" height="auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="border border-3 border-primary"></div>
                        <div class="card bg-white">
                            <div class="card-body p-5">
                                <div class="text-center m-1 text-xl-center mb-5">
                                    <h3 class="text-dark">
                                    <u>Admin Pannel</u></h3>
                                </div>
                                <div class="text-center">
                                    <?php if (session()->getFlashdata('msg')) : ?>
                                        <span class="bg-success text-white p-2 "><?= session()->getFlashdata('msg') ?></span>
                                    <?php endif; ?>
                                    <?php if (session()->getFlashdata('err')) : ?>
                                        <span class="bg-danger text-white p-2"><?= session()->getFlashdata('err') ?></span>
                                    <?php endif; ?>
                                </div>

                                <form class="mb-3 mt-md-4" action="<?= base_url("admin/login")?>" method="post">
                                    <div class="mb-3">
                                        <label for="email" class="form-label ">Email address</label>
                                        <input type="email"name="email" class="form-control" id="email" placeholder="name@example.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label ">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="*******" required>
                                    </div>
                                    <p class="small">
                                        <a class="text-primary" href="https://api.whatsapp.com/send?phone=919315297757&text=%F0%9F%91%8D%F0%9F%91%8D%F0%9F%91%8D">
                                            Having any troubleshoting ? contact us
                                        </a>
                                    </p>
                                    <div class="d-grid">
                                        <button class="btn btn-outline-dark" type="submit">Login</button>
                                    </div>
                                </form>
                                <div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
<?= $this->endSection() ?>
