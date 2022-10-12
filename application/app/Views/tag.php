<?= $this->extend('include/user') ?>
<?= $this->section("section-blog") ?>

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="text-danger">#TAG - <?= ucwords($header) ?></h3>
                <div class="all-blog-posts">
                    <div class="row">
                        <?php if($blog): ?>
                            <?php foreach($blog as $data): ?>
                            <?php foreach($data as $b): ?>
                                <div class="col-lg-12">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="<?= base_url()."/img/blog/compress/".$b['image'] ?>" alt="<?= $b['title'] ?>">
                                        </div>
                                        <div class="down-content">
                                            <a href="<?= base_url("blog/". strtolower($b['id'])) ?>">
                                                <h4><?= ucwords($b['title']) ?></h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#">Admin</a></li>
                                                <?php $cdate = strtotime($b['created_at']);?>
                                                <li><a href="#"><?php echo date("d-m-Y",$cdate);  ?></a></li>
                                                <li><a href="#">12 Comments</a></li>
                                            </ul>
                                            <p><?= word_limiter($b['description'],100) ?></p>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                        <a class="btn btn-primary readMore" href="<?= base_url("blog/". $b['id']) ?>" title="<?= ucwords($b['title']) ?>>">Read More</a>
                                                    </div>
                                                    <div class="col-6 col-md-6">
                                                        <ul class="post-share">
                                                            <li><i class="fa fa-share-alt"></i></li>
                                                            <li><a href="#">Facebook</a>,</li>
                                                            <li><a href="#"> Instagram</a></li>
                                                            <li><a href="#"> Linkedin</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php else:?>
                        <div class="alert alert-info"> No Post Found of this Tag ! </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" style="background:#f1f1f1; padding-top:1rem;">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item search">
                                <form id="search_form" name="gs" method="GET" action="#">
                                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Recent Posts</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <?php if($recentBlog): ?>
                                        <?php foreach($recentBlog as $blog): ?>
                                            <li>
                                                <a href="<?= base_url("blog/". $blog['id']) ?>">
                                                    <h5> <?=  $blog['title'] ?> </h5>
                                                    <?php $cdate = strtotime($blog['created_at']);?>
                                                    <span><?php echo date("d-m-Y",$cdate);  ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item categories">
                                <div class="sidebar-heading">
                                    <h2>Categories</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <?php if($recentCategory): ?>
                                            <?php foreach($recentCategory as $c): ?>
                                                <li><a href="<?= base_url("blog/category/".strtolower($c['name'])) ?>">- <?= ucwords($c['name']) ?></a></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item tags">
                                <div class="sidebar-heading">
                                    <h2>Tag Clouds</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <?php if($tag): ?>
                                            <?php foreach($tag as $t): ?>
                                                <li><a href="<?= base_url("blog/tag/".strtolower($t['name'])) ?>"> <?= $t['name'] ?></a></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
