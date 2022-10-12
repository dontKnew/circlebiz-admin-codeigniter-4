<?= $this->extend('include/app') ?>
<?= $this->section('contents') ?>
<!-- START ADD BLOG POST  -->
<div class="container-fluid pt-0 px-0 my-2">
    <div class="row  rounded  mx-0 d-flex justify-content-center py-4 vh-100" style=" background-color:#f3f0f0 !important;">
        <div class="col-md-8">
            <h4 class="mb-4 text-center text-black"> Add Blog Category </h4>
            <div class="text-center">
                <?php if (session()->getFlashdata('msg')) : ?>
                    <span class="bg-success text-white p-2 "><?= session()->getFlashdata('msg') ?></span>
                <?php endif; ?>
                <?php if (session()->getFlashdata('err')) : ?>
                    <span class="bg-danger text-white p-2"><?= session()->getFlashdata('err') ?></span>
                <?php endif; ?>
            </div>
            <form action="<?= base_url("admin/blog-category/add") ?>" method="post">
                <div class="row d-flex justify-content-center mt p-4">
                    <div class="col-6">
                        <div class="mb-3 ">
                            <label for="" class="form-label text-blue">Category Name</label>
                            <input type="text" name="name" class="form-control form-white " required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-green">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END ADD BLOG POST -->
<?= $this->endSection(); ?>
