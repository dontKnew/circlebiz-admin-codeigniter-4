<?= $this->extend('include/user') ?>
<?php
?>
?>
<?= $this->section("section-blog") ?>
<section class="blog-posts blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="<?= base_url()."/img/blog/compress/".$b['image'] ?>" alt="<?= $b['title'] ?>">
                                </div>
                                <div class="down-content">
                                    <a href="<?= base_url("blog/category/". strtolower($b['category'])) ?>"
                                    <h4> <span>Category-<?= ucwords($b['category']) ?></span></h4>
                                    </a>
                                    <a href="<?= base_url("blog/". strtolower($b['id'])) ?>"><h4><?= ucwords($b['title']) ?></h4></a>
                                    <ul class="post-info">
                                        <li><a href="#">Admin</a></li>
                                        <?php $cdate = strtotime($b['created_at']);?>
                                        <li><a href="#"><?php echo date("d-m-Y",$cdate);  ?></a></li>
                                        <li><a href="#">12 Comments</a></li>
                                    </ul>
                                    <p><?=$b['description'] ?></p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6 col-md-6">

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

                        <div class="col-lg-12">
                            <div class="sidebar-item comments">
                                <div class="sidebar-heading">
                                    <h2>4 comments</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>
                                            <div class="author-thumb">
                                                <img src="https://www.circlebiz.in/images/clients/man-icon.png" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Charles Kate<span>May 16, 2020</span></h4>
                                                <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.</p>
                                            </div>
                                        </li>
                                        <li class="replied">
                                            <div class="author-thumb">
                                                <img src="https://www.circlebiz.in/images/clients/women-icon.png" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Thirteen Man<span>May 20, 2020</span></h4>
                                                <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar vel mattis eget.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="author-thumb">
                                                <img src="https://www.circlebiz.in/images/clients/man-icon.png" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Belisimo Mama<span>May 16, 2020</span></h4>
                                                <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt in, ultrices eget ligula. Sed vitae suscipit ligula. Vestibulum id turpis volutpat, lobortis turpis ac, molestie nibh.</p>
                                            </div>
                                        </li>
                                        <li class="replied">
                                            <div class="author-thumb">
                                                <img src="https://www.circlebiz.in/images/clients/women-icon.png" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Thirteen Man<span>May 22, 2020</span></h4>
                                                <p>Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="sidebar-item submit-comment">
                                <div class="sidebar-heading">
                                    <h2>Your comment</h2>
                                </div>
                                <div class="content">
                                    <form id="comment" action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="name" type="text" id="name" placeholder="Your name" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="email" type="text" id="email" placeholder="Your email" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <fieldset>
                                                    <input name="subject" type="text" id="subject" placeholder="Subject">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Submit</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                        <?php foreach($recentBlog as $blog): ?>
                                            <li>
                                                <a href="<?= base_url("blog/". $blog['id']) ?>">
                                                    <h5><?=  $blog['title'] ?></h5>
                                                    <?php $cdate = strtotime($blog['created_at']);?>
                                                    <span><?php echo date("d-m-Y",$cdate);  ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
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
                                        <?php foreach($recentCategory as $c): ?>
                                            <li><a href="<?= base_url("blog/category/".strtolower($c['name'])) ?>">- <?= $c['name'] ?></a></li>
                                        <?php endforeach; ?>
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
