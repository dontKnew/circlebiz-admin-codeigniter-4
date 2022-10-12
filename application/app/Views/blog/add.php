<?= $this->extend('include/app') ?>

<?= $this->section("text-editor") ?>
<script src="<?= base_url("lib/text-editor/jquery-3.4.1.slim.min.js")?>"></script>
<script src="<?= base_url("lib/text-editor/summernote-lite.min.js")?>"></script>
<script>
    $(document).ready(function(){
        $('#full_editor').summernote({
            tabsize: 2,
            height: 200,
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('contents') ?>
<!-- START ADD BLOG POST  -->
<div class="container-fluid pt-0 px-0 my-2">
    <div class="row  rounded  mx-0 d-flex justify-content-center py-4" style=" background-color:#f3f0f0 !important;">
        <div class="col-md-8">
            <h4 class="mb-4 text-center text-black"> Add Blog Post </h4>
            <div class="text-center">
                <?php if (session()->getFlashdata('msg')) : ?>
                    <span class="bg-success text-white p-2 "><?= session()->getFlashdata('msg') ?></span>
                <?php endif; ?>
                <?php if (session()->getFlashdata('err')) : ?>
                    <span class="bg-danger text-white p-2"><?= session()->getFlashdata('err') ?></span>
                <?php endif; ?>
            </div>
            <form action="<?= base_url("admin/blog-post/add") ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Post Title</label>
                            <input type="text" name="title" class="form-control form-white " required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Post Category</label>
                            <select name="category" class="form-control form-white " required>
                                <option value="">Select Category</option>
                                <?php foreach ($category as $c):?>
                                    <option value="<?= $c['name'] ?>"><?= $c['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Post Description</label>
                            <textarea id="full_editor"  name="description" class="form-control form-white" required> </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Blog Privacy</label>
                            <select name="privacy" class="form-control form-white " required>
                                <option value="Public">Public</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Blog Image</label>
                            <input type="file" name="image" class="form-control form-white " required>
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
