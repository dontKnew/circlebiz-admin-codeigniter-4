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
<!-- START UPDATE BLOG POST  -->
<div class="container-fluid pt-0 px-0 my-2">
    <div class="row  rounded  mx-0 d-flex justify-content-center py-4" style=" background-color:#f3f0f0 !important;">
        <div class="col-md-8">
            <h4 class="mb-4 text-center text-black"> <i class="fas fa-edit mx-1"></i> Edit Blog Post </h4>
            <div class="text-center">
                <?php if (session()->getFlashdata('msg')) : ?>
                    <span class="bg-success text-white p-2 "><?= session()->getFlashdata('msg') ?></span>
                <?php endif; ?>
                <?php if (session()->getFlashdata('err')) : ?>
                    <span class="bg-danger text-white p-2"><?= session()->getFlashdata('err') ?></span>
                <?php endif; ?>
            </div>
            <form action="<?= base_url("admin/blog-post/update") ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Post Title</label>
                            <input type="text" name="title" value="<?= $data['title'] ?>" class="form-control form-white " required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Post Category</label>
                            <select name="category" class="form-control form-white " required>
                            <option value="">Select Category</option>
                            <?php foreach ($category as $c):?>
                                <?php if(ucwords($data['category'])==ucwords($c['name'])): ?>
                                    <option value="<?= $data['category'] ?>" selected><?= ucwords($c['name']) ?></option>
                                <?php endif; ?>
                            <?php if(ucwords($data['category'])!==ucwords($c['name'])): ?>
                                <option value="<?= $c['name'] ?>"><?= ucwords($c['name']) ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Blog Image</label>
                            <input type="file" name="image" class="form-control form-white ">
                            <img src="<?= base_url()."/img/blog/compress/".$data['image'] ?>" alt="<?= $data['title'] ?>" class=" mt-1 rounded" width="200" height="auto">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Blog Privacy</label>
                            <select name="privacy" class="form-control form-white " required>
                                <option value="Public" <?php if(ucwords($data['privacy'])=="Public"){echo "selected";} ?> >Public</option>
                                <option value="Private"  <?php if(ucwords($data['privacy'])=="Private"){echo "selected";} ?>>Private</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Post Description</label>
                            <textarea id="full_editor" name="description" class="form-control form-white" cols="30" rows="10" required> <?= $data['description'] ?> </textarea>
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
<!-- END UPDATE BLOG POST -->
<?= $this->endSection(); ?>
