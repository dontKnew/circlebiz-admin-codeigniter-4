
<?= $this->extend('include/app') ?>

<?= $this->section('contents') ?>

    <!--   START ENQUIRY INFORMATION TABLE -->
    <div class="container-fluid pt-0 px-0 my-2">
        <div class="vh-100 bg-grey-l text-center rounded p-4" style=" background-color:#f3f0f0 !important;">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <h4 class="mb-0 text-black">ENQUIRY TABLE</h4>
            </div>
            <div class="text-center  my-2">
                <?php if (session()->getFlashdata('msg')) : ?>
                    <span class="bg-success text-white p-2 "><?= session()->getFlashdata('msg') ?></span>
                <?php endif; ?>
                <?php if (session()->getFlashdata('err')) : ?>
                    <span class="bg-danger text-white p-2"><?= session()->getFlashdata('err') ?></span>
                <?php endif; ?>
            </div>
            <?php if($data): ?>
            <div class="table-responsive" id="shipmentSearchData">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-blue">
                        <th scope="col" class="btn-blue">Name</th>
                        <th scope="col" class="btn-blue">Email</th>
                        <th scope="col" class="btn-blue">Message</th>
                        <th scope="col" class="btn-blue">Date</th>
                        <th scope="col" class="btn-blue">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $value){ ?>
                        <tr class="text-dark bg-white">
                            <td><?= ucwords($value['name']); ?></td>
                            <td><?= strtolower($value['email']); ?></td>
                            <td><?= ucwords($value['message']); ?></td>
                            <?php $cdate = strtotime($value['created_at']);?>
                            <td><?php echo date("d-m-Y",$cdate);  ?></td>
                            <td>
                                <a href="mailto:<?= $value['email'] ?>?&subject=Got Your Mail - CircleBiz&Body=Thanks for given your valuable time!" class="btn btn-sm btn-warning"> <i class="fas fa-envelope-open-text mx-1"></i> Send Mail </a>
                                <a href="<?= base_url("admin/enquiry/".$value['id']) ?>"  class="btn btn-sm btn-danger"> <i class="fas fa-trash mx-1 "></i> Delete </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="alert alert-info d-flex justify-content-center align-items-center" role="alert">
                    <i class="fas fa-exclamation-circle 2x mx-1"></i>  You have not recieved any enquiry yet...
                </div>
            <?php endif;?>
        </div>
    </div>
    <!--   END ENQUIRY INFORMATION TABLE -->

<?= $this->endSection() ?>
