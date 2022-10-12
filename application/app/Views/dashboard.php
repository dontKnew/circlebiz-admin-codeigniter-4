<?= $this->extend('include/app') ?>
<?= $this->section('contents') ?>

    <!--   START DASHBOARD INFORMATION -->
    <div class="container-fluid pt-0 px-0">
        <div class="vh-100 bg-grey-l text-center rounded p-4" style=" background-color:#f3f0f0 !important;">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <h4 class="mb-0 text-black">Welcome Your are Logged!</h4>
            </div>

            <div class="row g-4 d-flex justify-content-center align-items-center">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2 text-blue">Total Blog</p>
                            <h3 class="mb-0 text-dark"><?= $post ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2 text-blue">Blog Category</p>
                            <h3 class="mb-0 text-dark"><?= $category ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2 text-blue">Total Enquiry</p>
                            <h3 class="mb-0 text-dark"><?= $enquiry ?></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--   END DASHBOARD INFORMATION -->
<?= $this->endSection() ?>
