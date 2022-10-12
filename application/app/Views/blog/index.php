
<?= $this->extend('/include/app') ?>

<?= $this->section('contents') ?>

    <!--   START BLOG INFORMATION TABLE -->
    <div class="container-fluid pt-0 px-0">
        <div class="vh-100 bg-grey-l rounded p-4" style=" background-color:#f3f0f0 !important;">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <h4 class="mb-0 text-black">BLOG POST TABLE</h4>
            </div>
            <div class="text-center my-2">
                <?php if (session()->getFlashdata('msg')) : ?>
                    <span class="bg-success text-white p-2 "><?= session()->getFlashdata('msg') ?></span>
                <?php endif; ?>
                <?php if (session()->getFlashdata('err')) : ?>
                    <span class="bg-danger text-white p-2"><?= session()->getFlashdata('err') ?></span>
                <?php endif; ?>
            </div>
            <?php if($data): ?>
            <div class="table-responsive" id="shipmentSearchData">
                <a href="<?= base_url("admin/blog-post/add") ?>" class="btn btn-info my-2"><i class="fas fa-plus-square mx-1 "></i>Add Post</a>
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-blue">
                        <th scope="col" class="btn-blue">Title</th>
                        <th scope="col" class="btn-blue">Image</th>
                        <th scope="col" class="btn-blue">Category</th>
                        <th scope="col" class="btn-blue">Description</th>
                        <th scope="col" class="btn-blue">status</th>
                        <th scope="col" class="btn-blue">Posted At</th>
                        <th scope="col" class="btn-blue">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $value){ ?>
                        <tr class="text-dark bg-white">
                            <td><?= ucwords($value['title']); ?></td>
                            <td>
                                <img src="<?= base_url()."/img/blog/compress/".$value['image'] ?>" alt="<?= $value['title'] ?>" width="150" height="auto">
                            </td>
                            <td><?= ucwords($value['category']); ?></td>
                            <td><?= word_limiter($value['description'], 30); ?></td>
                            <td><?= ucwords($value['privacy']); ?></td>
                            <?php $cdate = strtotime($value['created_at']);?>
                            <td><?php echo date("d-m-Y",$cdate);  ?></td>
                            <td>
                                <a href="<?= base_url("admin/blog-post/edit/".$value['id']) ?>"  class="mb-1 btn btn-sm btn-success"> <i class="fas fa-edit mx-1"></i> Edit </a>
                                <a href="<?= base_url("admin/blog-post/".$value['id']) ?>"  class="btn btn-sm btn-danger"> <i class="fas fa-trash mx-1"></i> Delete </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="alert alert-info d-flex justify-content-center align-items-center" role="alert">
                    <i class="fas fa-exclamation-circle 2x mx-1"></i>  You have not posted any blog yet...
                </div>
            <div class="text-center">
                <a href="<?= base_url("admin/blog-post/add") ?>" class="btn btn-lg btn-warning my-2"><i class="fas fa-plus-square"></i> Add Post</a>
            </div>
            <?php endif;?>
        </div>
    </div>
    <!--   END BLOG INFORMATION TABLE -->

<?= $this->endSection() ?>
